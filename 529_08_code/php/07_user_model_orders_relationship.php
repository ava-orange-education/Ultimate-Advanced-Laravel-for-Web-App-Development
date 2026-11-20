class UserModel extends Model
{
    public function orders()
    {
        return $this->hasMany(OrderModel::class);
    }
}