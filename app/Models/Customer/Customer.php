<?php

namespace App\Models\Customer;

use App\Models\Business\BusinessParam;
use App\Models\Core\Agency;
use App\Models\Core\Invoice;
use App\Models\Core\Package;
use App\Models\Document\DocumentTransmiss;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Customer\Customer
 *
 * @property int $id
 * @property string $status_open_account
 * @property int $cotation Cotation bancaire du client
 * @property string $auth_code
 * @property int $ficp
 * @property int $fcc
 * @property int|null $agent_id
 * @property int $user_id
 * @property int $package_id
 * @property int $agency_id
 * @property-read Agency|null $agency
 * @property-read User|null $agent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Customer\CustomerBeneficiaire[] $beneficiaires
 * @property-read int|null $beneficiaires_count
 * @property-read \App\Models\Customer\CustomerSituationCharge|null $charge
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Customer\CustomerDocument[] $documents
 * @property-read int|null $documents_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Customer\CustomerEpargne[] $epargnes
 * @property-read int|null $epargnes_count
 * @property-read \App\Models\Customer\CustomerSituationIncome|null $income
 * @property-read \App\Models\Customer\CustomerInfo|null $info
 * @property-read Package $package
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Customer\CustomerPret[] $prets
 * @property-read int|null $prets_count
 * @property-read \App\Models\Customer\CustomerSetting|null $setting
 * @property-read \App\Models\Customer\CustomerSituation|null $situation
 * @property-read \Illuminate\Database\Eloquent\Collection|DocumentTransmiss[] $transmisses
 * @property-read int|null $transmisses_count
 * @property-read User $user
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Customer\CustomerWallet[] $wallets
 * @property-read int|null $wallets_count
 * @method static \Database\Factories\Customer\CustomerFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer query()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereAgencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereAgentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereAuthCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereCotation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereFcc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereFicp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer wherePackageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereStatusOpenAccount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereUserId($value)
 * @mixin \Eloquent
 * @mixin IdeHelperCustomer
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Customer\CustomerMobility[] $mobilities
 * @property-read int|null $mobilities_count
 * @property-read \Illuminate\Database\Eloquent\Collection|Invoice[] $invoices
 * @property-read int|null $invoices_count
 * @property-read mixed $status_color
 * @property-read mixed $status_label
 * @property-read mixed $status_text
 * @property-read mixed $sum_account
 * @property-read mixed $sum_epargne
 * @property-read \App\Models\Customer\CustomerInfoInsurance|null $info_insurance
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Customer\CustomerInsurance[] $insurances
 * @property-read int|null $insurances_count
 * @property string|null $persona_reference_id
 * @method static \Illuminate\Database\Eloquent\Builder|Customer wherePersonaReferenceId($value)
 * @property-read mixed $next_debit_package
 * @property-read BusinessParam|null $business
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Customer\CustomerRequest[] $requests
 * @property-read int|null $requests_count
 */
class Customer extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $timestamps = false;
    protected $appends = ['status_label', 'sum_account', 'sum_epargne', 'next_debit_package'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id');
    }

    public function agency()
    {
        return $this->belongsTo(Agency::class, 'agency_id');
    }

    public function info()
    {
        return $this->hasOne(CustomerInfo::class);
    }

    public function setting()
    {
        return $this->hasOne(CustomerSetting::class);
    }

    public function situation()
    {
        return $this->hasOne(CustomerSituation::class);
    }

    public function charge()
    {
        return $this->hasOne(CustomerSituationCharge::class);
    }

    public function income()
    {
        return $this->hasOne(CustomerSituationIncome::class);
    }

    public function wallets()
    {
        return $this->hasMany(CustomerWallet::class);
    }

    public function beneficiaires()
    {
        return $this->hasMany(CustomerBeneficiaire::class);
    }

    public function documents()
    {
        return $this->hasMany(CustomerDocument::class);
    }

    public function transmisses()
    {
        return $this->hasMany(DocumentTransmiss::class);
    }

    public function agent()
    {
        return $this->hasOne(User::class, 'id', 'agent_id');
    }

    public function prets()
    {
        return $this->hasMany(CustomerPret::class);
    }

    public function epargnes()
    {
        return $this->hasMany(CustomerEpargne::class);
    }

    public function mobilities()
    {
        return $this->hasMany(CustomerMobility::class);
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    public function info_insurance()
    {
        return $this->hasOne(CustomerInfoInsurance::class);
    }

    public function insurances()
    {
        return $this->hasMany(CustomerInsurance::class);
    }

    public function business()
    {
        return $this->hasOne(BusinessParam::class);
    }

    public function requests()
    {
        return $this->hasMany(CustomerRequest::class);
    }

    public function getStatusTextAttribute()
    {
        $t = null;
        switch ($this->status_open_account) {
            case 'open': $t = 'Ouverture en cours'; break;
            case 'completed': $t = 'Dossier complet'; break;
            case 'accepted': $t = 'Dossier accepté'; break;
            case 'declined': $t = 'Dossier refusé'; break;
            case 'suspended': $t = 'Client suspendue'; break;
            case 'closed': $t = 'Dossier cloturé'; break;
            default: return 'Client actif'; break;
        }

        return $t;
    }

    public function getStatusColorAttribute()
    {
        $t = null;
        match ($this->status_open_account) {
            'open' => $t = 'primary',
            'completed', 'suspended' => $t = 'warning',
            'accepted' => $t = 'success',
            'declined', 'closed' => $t = 'danger',
            default => $t = 'secondary',
        };

        return $t;
    }

    public function getStatusLabelAttribute()
    {
        return "<span class='badge badge-sm badge-".$this->getStatusColorAttribute()."'>".$this->getStatusTextAttribute()."</span>";
    }

    public function getSumAccountAttribute()
    {
        return $this->wallets()->where('type', 'compte')->where('status', 'active')->sum('balance_actual');
    }

    public function getSumEpargneAttribute()
    {
        return $this->wallets()->where('type', 'epargne')->where('status', 'active')->sum('balance_actual');
    }

    public function getNextDebitPackageAttribute()
    {
        return match ($this->package->type_prlv) {
            "mensual" => Carbon::createFromDate(now()->year, now()->addMonth()->month, $this->user->created_at->day),
            "trim" => Carbon::createFromDate(now()->year, now()->addMonths(3)->month, $this->user->created_at->day),
            "sem" => Carbon::createFromDate(now()->year, now()->addMonths(6)->month, $this->user->created_at->day),
            "annual" => Carbon::createFromDate(now()->addYear()->year, $this->user->created_at->month, $this->user->created_at->day),
        };
    }



}
