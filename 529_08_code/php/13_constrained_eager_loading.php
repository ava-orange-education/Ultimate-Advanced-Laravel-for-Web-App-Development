$users = UserModel::with([
    'orders' => fn ($query) => $query->where('status', 'paid')
])->get();