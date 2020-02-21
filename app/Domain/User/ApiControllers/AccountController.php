<?php

namespace Domain\User\ApiControllers;

use Domain\User\UserData;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserAccountRequest;
use Domain\User\Actions\UpdateUserAction;

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
