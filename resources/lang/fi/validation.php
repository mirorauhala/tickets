<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
     */

    'accepted'             => 'Kenttä :attribute täytyy olla hyväksytty.',
    'active_url'           => 'Kenttä :attribute ei ole sallittava URL osoite.',
    'after'                => 'Kentän :attribute täytyy olla päivämäärä jälkeen :date.',
    'after_or_equal'       => 'Kentän :attribute täytyy olla päivämäärä jälkeen tai täsmälleen :date.',
    'alpha'                => 'Kenttä :attribute voi ainoastaan sisältää kirjaimia.',
    'alpha_dash'           => 'Kenttä :attribute voi ainoastaan sisältää kirjaimia, numeroja, ja viivoja.',
    'alpha_num'            => 'Kenttä :attribute voi ainoastaan sisältää kirjaimia ja numeroita.',
    'array'                => 'Kentän :attribute täytyy olla ryhmä.',
    'before'               => 'Kentän :attribute täytyy olla päivämäärä ennen :date.',
    'before_or_equal'      => 'kentän :attribute täytyy olla päivämäärä ennen tai täsmälleen :date.',
    'between'              => [
        'numeric' => 'Kentän :attribute täytyy olla numeroiden :min ja :max väliltä.',
        'file'    => 'Kentän :attribute täytyy olla kooltaan :min - :max kilotavua.',
        'string'  => 'Kentän :attribute täytyy olla kooltaan :min - :max merkkiä.',
        'array'   => 'Kentän :attribute täytyy sisältää :min - :max kohdetta.',
    ],
    'boolean'              => 'Kentän :attribute täytyy olla joko tosi tai epätosi.',
    'confirmed'            => 'Kentän :attribute varmistus ei vastaa kenttää.',
    'date'                 => 'Kenttä :attribute ei ole sallittava päivämäärä.',
    'date_format'          => 'kenttä :attribute ei vastaa muotoilua :format.',
    'different'            => 'Kenttien :attribute ja :other täytyy olla erilaiset.',
    'digits'               => 'Kentän :attribute täytyy olla :digits numeroa.',
    'digits_between'       => 'Kentän :attribute on oltava väliltä :min - :max numeroa.',
    'dimensions'           => 'Kenttä :attribute ei ole sallittava kuvakoko.',
    'distinct'             => 'Kentässä :attribute on kaksoiskappale.',
    'email'                => 'Kenttä :attribute täytyy olla hyväksyttävä sähköpostiosoite.',
    'exists'               => 'Valittu kohta :attribute ei ole olemassa.',
    'file'                 => 'Kentän :attribute täytyy olla tiedosto.',
    'filled'               => 'Kenttä :attribute on vaadittu.',
    'image'                => 'Kentän :attribute on oltava kuva.',
    'in'                   => 'Kenttä :attribute ei ole sopiva.',
    'in_array'             => 'Kenttä :attribute ei löydy kentästä :other.',
    'integer'              => 'Kenttä :attribute on oltava kokonaisluku.',
    'ip'                   => 'Kenttä :attribute on oltava IP osoite.',
    'json'                 => 'Kenttä :attribute on oltava JSON merkkijono.',
    'max'                  => [
        'numeric' => 'Arvo :attribute ei voi olla suurempi kuin :max.',
        'file'    => 'Kenttä :attribute ei voi olla suurempi kuin :max kilotavua.',
        'string'  => 'Kenttä :attribute ei voi olla suurempi kuin :max merkkiä.',
        'array'   => 'Kenttä :attribute ei voi sisältää enempää kuin :max kohdetta.',
    ],
    'mimes'                => 'Kenttä :attribute on oltava tiedostotyypiltään: :values.',
    'mimetypes'            => 'Kenttä :attribute on oltava tiedostotyypiltään: :values.',
    'min'                  => [
        'numeric' => 'Kentän :attribute on oltava vähintään :min.',
        'file'    => 'Kentän :attribute on oltava vähintään :min kilotavua.',
        'string'  => 'Kentän :attribute on oltava vähintään :min merkkiä.',
        'array'   => 'Kentän :attribute täytyy sisältää vähintään :min kohdetta.',
    ],
    'not_in'               => 'Valittu kenttä :attribute ei ole sopiva.',
    'numeric'              => 'Kentän :attribute on oltava numero.',
    'present'              => 'Kenttä :attribute on oltava esillä.',
    'regex'                => 'Kentän :attribute muotoilu ei ole sopiva.',
    'required'             => 'Kenttä :attribute on vaadittu.',
    'required_if'          => 'Kenttä :attribute on vaadittu kun :other on :value.',
    'required_unless'      => 'Kenttä :attribute on vaadittu ellei :other ole :values.',
    'required_with'        => 'Kenttä :attribute on vaadittu kun :values on esillä.',
    'required_with_all'    => 'Kenttä :attribute on vaaduttu kun :values ovat esillä.',
    'required_without'     => 'Kenttä :attribute on vaadittu kun :values eivät ole esillä.',
    'required_without_all' => 'Kenttä :attribute on vaadittu kun :values ei ole esillä.',
    'same'                 => 'Kenttien :attribute ja :other täytyy vastata toisiaan.',
    'size'                 => [
        'numeric' => 'Kenttä :attribute on oltava kooltaan :size.',
        'file'    => 'Kenttä :attribute on oltava kooltaan :size kilotavua.',
        'string'  => 'kenttä :attribute on oltava kooltaan :size merkkiä.',
        'array'   => 'Kentän :attribute täytyy sisältää :size kohdetta.',
    ],
    'string'               => 'Kenttä :attribute on oltava string.', // no kerro ite mikä on string suomeksi prkl
    'timezone'             => 'Kenttä :attribute on oltava aikavyöhyke.',
    'unique'               => 'Kenttä :attribute on jo varattu.',
    'uploaded'             => 'Kentän :attribute lähetys epäonnistui.',
    'url'                  => 'Kentän :attribute muotoilu ei ole sopiva.',

    'password'             => 'Nykyinen salasana on väärin.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
     */

    'validate_ticket_type_and_availablility ' => 'Chosen tickets are not available.',

    'custom' => [
        'tickets.*' => [
            'validate_ticket_type_and_availablility' => 'Liput eivät ole saatavilla tai et valinnut yhtään.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
     */

    'attributes' => [],
];
