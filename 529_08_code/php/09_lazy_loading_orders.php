$user = UserModel::find($id);
$orders = $user->orders; // triggers a new query