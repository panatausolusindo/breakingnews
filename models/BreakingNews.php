<?php namespace PanatauSolusindo\BreakingNews\Models;

use Model;

/**
 * BreakingNews Model
 */
class BreakingNews extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string table associated with the model
     */
    public $table = 'panatausolusindo_breakingnews_breaking_news';

    /**
     * @var array guarded attributes aren't mass assignable
     */
    protected $guarded = ['*'];

    /**
     * @var array fillable attributes are mass assignable
     */
    protected $fillable = [];

    /**
     * @var array rules for validation
     */
    public $rules = [
        'tulisan_id' => 'exists:yfktn_tulisan_tulis,id',
        'tampil_sd' => 'required'
    ];

    /**
     * @var array Attributes to be cast to native types
     */
    protected $casts = [];

    /**
     * @var array jsonable attribute names that are json encoded and decoded from the database
     */
    protected $jsonable = [];

    /**
     * @var array appends attributes to the API representation of the model (ex. toArray())
     */
    protected $appends = [];

    /**
     * @var array hidden attributes removed from the API representation of the model (ex. toArray())
     */
    protected $hidden = [];

    /**
     * @var array dates attributes that should be mutated to dates
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    /**
     * @var array hasOne and other relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [
        'tulisan' => ['Yfktn\Tulisan\Models\Tulisan', 'key' => 'tulisan_id', 'otherKey' => 'id']
    ];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];

    public function beforeSave()
    {
        if($this->tulisan == null) {
            throw new \Exception("Tulisan belum dipilih!");
        }
        if(strlen($this->attributes['judul']) <= 0) {
            // diputuskan untuk melakukan render 
            $this->attributes['judul'] = $this->tulisan->judul;
        }
        if(strlen($this->attributes['url']) <= 0) {
            // check kategori ada?
            $kat = $this->tulisan->kategori->first();
            if($kat == null) {
                throw new \Exception("Tulisan belum memiliki kategori!");
            }
            $this->attributes['url'] = sprintf("/%s/baca/%s", $kat->slug, $this->tulisan->slug);
        }
    }

    public function scopeTampil($query)
    {
        $query->where('tampil_sd', '>=', date('Y-m-d'));
    }
}
