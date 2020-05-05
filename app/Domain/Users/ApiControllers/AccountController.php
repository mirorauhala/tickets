<?php

namespace Domain\Users\ApiControllers;

use Domain\Users\UserData;
use App\Http\Controllers\Controller;
use Domain\Users\Requests\UserAccountRequest;
use Domain\Users\Actions\UpdateUserAction;

class AccountController extends Controller
{
    /**
     * Update the user's account.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(UserAccountRequest $request, UpdateUserAction $action)
    {
        $userData = UserData::fromRequest($request);
        $action->run($request->user(), $userData);

        return $request->user();
    }
}
