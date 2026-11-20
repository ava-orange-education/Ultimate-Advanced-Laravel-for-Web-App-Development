$users = UserModel::all();

foreach ($users as $user) {
    echo $user->orders->count(); // executes a query per user
}