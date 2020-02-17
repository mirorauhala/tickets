@setup
    // require __DIR__.'/vendor/autoload.php';
    // (new \Dotenv\Dotenv(__DIR__, '.env'))->load();

    $server = "pixelity";
    $userAndServer = 'miro@'. $server;
    $repository = "mirorauhala/tickets";
    $baseDir = "/home/miro/lippukauppa";
    $releasesDir = "{$baseDir}/releases";
    $dataDir = "{$baseDir}/data";
    $currentDir = "{$baseDir}/current";
    $newReleaseName = date('Ymd-His');
    $newReleaseDir = "{$releasesDir}/{$newReleaseName}";
    $user = get_current_user();

    function logMessage($message) {
        return "echo '\033[32m" .$message. "\033[0m';\n";
    }
    function logYellow($message) {
        return "echo '\033[33m" .$message. "\033[0m';\n";
    }
    function redMessage($message) {
        return "echo '\033[41m" .$message. "\033[0m';\n";
    }
@endsetup

@servers(['local' => '127.0.0.1', 'remote' => $userAndServer])

@story('deploy')
    checkInitialisation
    cloneRepository
    runComposer
    updateSymlinks
    optimizeInstallation
    backupDatabase
    migrateDatabase
    blessNewRelease
    cleanOldReleases
    finishDeploy
@endstory

@task('init', ['on' => 'remote'])

    if [ ! -d {{ $releasesDir }} ]
    then
        {{ logMessage("⚡️   Running first-run initialisation.") }}
        echo "Creating {{ $releasesDir }} directory"
        mkdir {{ $releasesDir }}
        cd {{ $releasesDir }}

        echo "Cloning repository."
        git clone --depth 1 git@github.com:{{ $repository }} {{ $newReleaseName }}
        cd {{ $newReleaseDir }}
        echo "Running composer. This might take a while..."
        composer install --prefer-dist --no-scripts --no-dev -q -o
        cd ..

        echo "Creating {{ $dataDir }} directory for persistent data."
        mkdir {{ $dataDir }}

        echo "Moving storage folder to ./data/"
        cd {{ $newReleaseDir }}
        mv storage {{ $dataDir }}

        echo "Creating storage symlink."
        ln -nfs {{ $dataDir }}/storage storage

        echo "Creating ./data/.env file from .env.example"
        cp .env.example {{ $dataDir }}/.env

        echo "Creating .env symlink."
        ln -nfs {{ $dataDir }}/.env .env

        echo "Updating current release symlink."
        ln -nfs {{ $newReleaseDir }} {{ $currentDir }}

        chown miro:www-data -R {{ $baseDir }}

        {{ logMessage("⚡️   Initialisation done!") }}
        echo "This tool has created the following structure"
        ls -lah

        echo "----"
        {{ logYellow("./current") }}
        echo "Current is a symlink to the current release file. This allows an easy zero-downtime deployments."
        {{ logYellow("./data") }}
        echo "Data directory contains permanent data to be stored used by the application."
        {{ logYellow("./releases") }}
        echo "Releases directory contains releases cloned from git."
        echo "----"
        {{ logMessage("                                                   ") }}
        {{ logMessage("    Make sure to update .env file inside ./data    ") }}
        {{ logMessage("    otherwise deployments may fail.                ") }}
        {{ logMessage("                                                   ") }}
    else
        echo "Project already initialised."
        echo "You can now deploy with 'envoy run deploy'"
    fi
@endtask

@task('migrate', ['on' => 'remote'])
    cd {{ $currentDir }}
    sudo -u www-data php artisan migrate --force
@endtask

@task('checkInitialisation', ['on' => 'remote'])
    if [ ! -d {{ $releasesDir }} ]
    then
        {{ redMessage("🛑    Project not initialised.") }}
        echo "Run 'envoy run init' for first-time deployment."
        exit 126
    fi
@endtask

@task('cloneRepository', ['on' => 'remote'])
    {{ logMessage("🌀  Cloning repository...") }}
    mkdir -p {{ $releasesDir }}
    mkdir -p {{ $dataDir }}

    cd {{ $releasesDir }};

    {{-- Create the release dir --}}
    mkdir {{ $newReleaseDir }};

    {{-- Temporarily own the release permissions --}}
    chown miro:miro -R {{ $newReleaseDir }};

    {{-- Clone the repo --}}
    git clone --depth 1 git@github.com:{{ $repository }} {{ $newReleaseName }}

    {{-- Configure sparse checkout --}}
    cd {{ $newReleaseDir }}
    git config core.sparsecheckout true
    echo "*" > .git/info/sparse-checkout
    echo "!storage" >> .git/info/sparse-checkout
    echo "!public/build" >> .git/info/sparse-checkout
    git read-tree -mu HEAD

    {{-- Mark release --}}
    cd {{ $newReleaseDir }}
    echo "{{ $newReleaseName }}" > public/release-name.txt
@endtask

@task('runComposer', ['on' => 'remote'])
    {{ logMessage("🚚  Running Composer. This might take a while") }}
    cd {{ $newReleaseDir }};
    composer install --prefer-dist --no-scripts --no-dev -q -o;
@endtask

@task('updateSymlinks', ['on' => 'remote'])
    {{ logMessage("🔗  Updating storage to symlink...") }}
    # Remove the storage directory and replace with data symlink
    cd {{ $newReleaseDir }};
    rm -rf ./storage;
    ln -nfs {{ $dataDir }}/storage storage;

    # Remove the public/media directory and replace with storage data
    rm -rf ./public/storage;
    ln -nfs {{ $dataDir }}/storage/app/public public/storage;

    # Import the environment config
    ln -nfs {{ $dataDir }}/.env .env;
@endtask

@task('optimizeInstallation', ['on' => 'remote'])
    {{ logMessage("✨  Optimizing installation...") }}
    cd {{ $newReleaseDir }};
    php artisan clear-compiled;
@endtask

@task('backupDatabase', ['on' => 'remote'])
    {{ logMessage("📀  Backing up database...") }}
    cd {{ $newReleaseDir }}
    echo 'WIP: automated deploy-time backups'
@endtask

@task('migrateDatabase', ['on' => 'remote'])
    {{ logMessage("🙈  Migrating database...") }}
    cd {{ $newReleaseDir }};
    php artisan migrate --force;
@endtask

@task('blessNewRelease', ['on' => 'remote'])
    {{ logMessage("🙏  Blessing new release...") }}

    {{-- Restore permissions for webserver --}}
    [[ -d {{ $currentDir }}]] || chown www-data:www-data -R {{ $currentDir }}

    ln -nfs {{ $newReleaseDir }} {{ $currentDir }};
    cd {{ $newReleaseDir }}

    sudo -u www-data php artisan config:clear
    sudo -u www-data php artisan cache:clear
    sudo -u www-data php artisan config:cache
    sudo -u www-data php artisan view:cache
@endtask

@task('cleanOldReleases', ['on' => 'remote'])
    {{ logMessage("🚾  Cleaning up old releases...") }}
    # Delete all but the 5 most recent.
    cd {{ $releasesDir }}
    ls -dt {{ $releasesDir }}/* | tail -n +6 | xargs -d "\n" sudo chown -R www-data .;
    ls -dt {{ $releasesDir }}/* | tail -n +6 | xargs -d "\n" rm -rf;
@endtask

@task('finishDeploy', ['on' => 'local'])
    {{ logMessage("🚀  Application deployed!") }}
@endtask

@task('deployOnlyCode',['on' => 'remote'])
    {{ logMessage("💻  Deploying code changes...") }}
    cd {{ $currentDir }}
    git pull origin master
    php artisan config:clear
    php artisan cache:clear
    php artisan config:cache
    php artisan view:cache
@endtask
