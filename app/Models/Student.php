class Student extends Model
{
    public $timestamps = false; // Disable auto timestamps

    protected $fillable = ['name', 'department', 'gender', 'skill']; // Ensure gender and skill are fillable
}
