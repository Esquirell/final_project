<?php


namespace App\Repository;


use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserRepository implements UserRepositoryInterface
{
    /**
     * Найти юзера по почте
     * @param $email
     * @return User|null
     */
    public function findUserByEmail($email): ?User
    {
        return User::where('email', $email)->firstOrFail();
    }

    /**
     * Добавить роль доктора юзеру
     * @param User $user
     */
    public function addRoleDoctor(User $user): void
    {
        $role = json_decode($user->role);
        array_push($role,'doctor');
        $user->role = json_encode($role);
        $user->save();
    }

    /**
     * Удалить роль доктора
     * @param User $user
     */
    public function deleteRoleDoctor(User $user): void
    {
        $roles = json_decode($user->role);
        $key = array_search('doctor', $roles);
        unset ($roles[$key]);
        $user->role = json_encode($roles);
        $user->save();
    }

    /**
     * Обновить инфу о юзере
     * @param Request $request
     */
    public function updateInfoABoutUser(Request $request): void
    {
        $user = Auth::user();
        $user->name = $request['user_name'];
        $user->surname = $request['user_surname'];
        $user->save();
    }

    /**
     * Обновить аватарку
     * @param Request $request
     */
    public function updateAvatar(Request $request)
    {
        $user = Auth::user();
        $file = $request->file();
        if ($file['file']->getClientMimeType() !== 'image/png') {
            \Session::flash('flash_message', 'Неподходящее расширение файла!');
            return redirect(route('personal-cabinet'));
        }
        $file['file']->move(public_path(addcslashes("img\avatars".$user->id,$user->id)), ($user->id).'_'.$file['file']->getClientOriginalName());
        if ($user->avatar !== 'img\avatars\default.png') {
            unlink(public_path($user->avatar));
        }
        $user->avatar = "img\avatars\\".$user->id.'\\'. ($user->id).'_'.$file['file']->getClientOriginalName();
        $user->save();
    }


}
