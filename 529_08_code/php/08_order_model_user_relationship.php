class OrderModel extends Model
{
    public function user()
    {
        return $this->belongsTo(UserModel::class);
    }
}