<?php

namespace App\Models\Customer;

use App\Models\Core\Bank;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Customer\CustomerMobility
 *
 * @mixin IdeHelperCustomerMobility
 * @property int $id
 * @property string $status
 * @property string $old_iban
 * @property string|null $old_bic
 * @property string $mandate
 * @property Carbon $start
 * @property Carbon $end_prov
 * @property string|null $env_real
 * @property Carbon|null $end_prlv
 * @property int $close_account
 * @property string|null $comment
 * @property string|null $code
 * @property int $customer_id
 * @property int $bank_id
 * @property int $customer_wallet_id
 * @property-read Bank $bank
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Customer\CustomerMobilityCheque[] $cheques
 * @property-read int|null $cheques_count
 * @property-read \App\Models\Customer\Customer $customer
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Customer\CustomerMobilityVirIncoming[] $incomings
 * @property-read int|null $incomings_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Customer\CustomerMobilityVirOutgoing[] $outgoings
 * @property-read int|null $outgoings_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Customer\CustomerMobilityPrlv[] $prlvs
 * @property-read int|null $prlvs_count
 * @property-read \App\Models\Customer\CustomerWallet $wallet
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerMobility newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerMobility newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerMobility query()
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerMobility whereBankId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerMobility whereCloseAccount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerMobility whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerMobility whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerMobility whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerMobility whereCustomerWalletId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerMobility whereEndPrlv($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerMobility whereEndProv($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerMobility whereEnvReal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerMobility whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerMobility whereMandate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerMobility whereOldBic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerMobility whereOldIban($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerMobility whereStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerMobility whereStatus($value)
 * @property Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerMobility whereUpdatedAt($value)
 * @property-read mixed $comment_text
 * @property-read mixed $status_color
 * @property-read mixed $status_label
 * @property-read mixed $status_text
 */
class CustomerMobility extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;

    protected $dates = ['start', 'end_prov', 'end_real', 'end_prlv', 'updated_at'];
    protected $appends = ['status_text', 'status_label', 'comment_text'];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class, 'bank_id');
    }

    public function wallet()
    {
        return $this->belongsTo(CustomerWallet::class, 'customer_wallet_id');
    }

    public function prlvs()
    {
        return $this->hasMany(CustomerMobilityPrlv::class);
    }

    public function incomings()
    {
        return $this->hasMany(CustomerMobilityVirIncoming::class);
    }

    public function outgoings()
    {
        return $this->hasMany(CustomerMobilityVirOutgoing::class);
    }

    public function cheques()
    {
        return $this->hasMany(CustomerMobilityCheque::class);
    }


    protected function closeAccount(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value == 0 ? 'Non' : 'Oui',
        );
    }

    public function getStatusTextAttribute()
    {
        return match ($this->status) {
            "bank_start" => "Dossier Transmis (Banque)",
            "bank_return" => "Dossier reçu (Banque)",
            "creditor_start" => "Dossier transmis (Créancier)",
            "creditor_end" => "Dossier reçu (Créancier)",
            "terminate" => "Dossier Terminer",
        };
    }

    public function getStatusColorAttribute()
    {
        return match ($this->status) {
            "bank_start", "creditor_start" => "danger",
            "bank_return", "terminate", "creditor_end" => "success",
        };
    }

    public function getStatusLabelAttribute()
    {
        return '<span class="badge badge-'.$this->getStatusColorAttribute().' badge-sm">'.$this->getStatusTextAttribute().'</span>';
    }

    public function getCommentTextAttribute()
    {
        return match($this->status) {
            "bank_start" => "Votre dossier à été transmis à la banque de départ",
            "bank_return" => "Votre dossier à été traité par la banque de départ et les informations sont dans notre banque",
            "creditor_start" => "Votre dossier à été transmis aux créancier",
            "creditor_end" => "Votre dossier à été traité par vos créancier et les informations sont dans notre banque",
            "terminate" => "Votre dossier est à présent clôturer",
        };
    }
}
