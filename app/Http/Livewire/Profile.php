<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Address;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\City;

class Profile extends Component
{
    use WithFileUploads;
    use WithPagination;
    //PROFILE DATA
    public $user, $avatar, $telepon, $address_id, $nama_depan, $nama_belakang, $alamat_1, $alamat_2, $kelurahan, $kecamatan;
    public $kode_pos;
    public $search;
    public $provinsi;
    public $kabupaten;

    public $updateMode = false;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $provinces = Province::all();
        $cities = City::all();
        $user = Auth::user();
        $address = $user->address;
        return view('livewire.profile', compact('user', 'address', 'provinces', 'cities'));
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
    private function resetInput()
    {
        $this->avatar = null;
        $this->nama_depan = null;
        $this->nama_belakang = null;
        $this->alamat_1 = null;
        $this->alamat_2 = null;
        $this->telepon = null;
        $this->kelurahan = null;
        $this->kecamatan = null;
        $this->kabupaten = null;
        $this->provinsi = null;
        $this->kode_pos = null;
    }

    public function address()
    {
        $this->validate([
            'nama_depan' => 'required|string|max:100',
            'nama_belakang' => 'required|string|max:100',
            'alamat_1' => 'required|string|max:255',
            'alamat_2' => 'required|string|max:255',
            'telepon' => 'required|string|max:12|unique:billing_address',
            'kelurahan' => 'required|string|max:100',
            'kecamatan' => 'required|string|max:100',
            'kabupaten' => 'required|string|max:100',
            'provinsi' => 'required|string|max:100',
            'kode_pos' => 'required|string|max:100'
        ]);
        Address::with('user')->create([
            'user_id' => Auth::id(),
            'nama_depan' => $this->nama_depan,
            'nama_belakang' => $this->nama_belakang,
            'alamat_1' => $this->alamat_1,
            'alamat_2' => $this->alamat_2,
            'telepon' => $this->telepon,
            'kelurahan' => $this->kelurahan,
            'kecamatan' => $this->kecamatan,
            'kabupaten' => $this->kabupaten,
            'provinsi' => $this->provinsi,
            'kode_pos' => $this->kode_pos
        ]);
        session()->flash('message', 'Alamat telah ditambahkan');
        $this->resetInput();
        return redirect()->to('/profile');
    }

    public function edit($id)
    {
        $this->updateMode = true;
        $user = Auth::user();
        $address = $user->address;
        $address = Address::where('id', $id)->first();
        $this->address_id = $id;
        $this->nama_depan = $address->nama_depan;
        $this->nama_belakang = $address->nama_belakang;
        $this->alamat_1 = $address->alamat_1;
        $this->alamat_2 = $address->alamat_2;
        $this->telepon = $address->telepon;
        $this->kelurahan = $address->kelurahan;
        $this->kecamatan = $address->kecamatan;
        $this->kabupaten = $address->kabupaten;
        $this->provinsi = $address->provinsi;
        $this->kode_pos = $address->kode_pos;
    }

    public function updateAddress()
    {
        $this->validate([
            'nama_depan' => 'required|string|max:100',
            'nama_belakang' => 'required|string|max:100',
            'alamat_1' => 'required|string|max:255',
            'alamat_2' => 'required|string|max:255',
            'telepon' => 'required|string|max:12',
            'kelurahan' => 'required|string|max:100',
            'kecamatan' => 'required|string|max:100',
            'kabupaten' => 'required|string|max:100',
            'provinsi' => 'required|string|max:100',
            'kode_pos' => 'required|string|max:100'
        ]);

        if ($this->address_id) {
            $address = Address::find($this->address_id);
            $address->update([
                'nama_depan' => $this->nama_depan,
                'nama_belakang' => $this->nama_belakang,
                'alamat_1' => $this->alamat_1,
                'alamat_2' => $this->alamat_2,
                'telepon' => $this->telepon,
                'kelurahan' => $this->kelurahan,
                'kecamatan' => $this->kecamatan,
                'kabupaten' => $this->kabupaten,
                'provinsi' => $this->provinsi,
                'kode_pos' => $this->kode_pos
            ]);
            $this->updateMode = false;
            session()->flash('message', 'Alamat telah diperbarui');
            $this->resetInput();
        }
        return redirect()->to('/profile');
    }

    public function updateAvatar()
    {
        $this->validate([
            'avatar' => 'image|max:2048|required',
        ]);

        $avatarName = md5($this->avatar . microtime() . '.' . $this->avatar->extension());
        Storage::putFileAs('public/avatars', $this->avatar, $avatarName);

        User::find(Auth()->id())->update([
            'avatar' => $avatarName,
        ]);
        session()->flash('message', 'Alamat telah diperbarui');
        $this->resetInput();
        return redirect()->to('/profile');
    }

    public function deleteAddress($id)
    {
        if ($id) {
            Address::where('id', $id)->delete();
            session()->flash('message', 'Alamat telah dihapus.');
        }
        return redirect()->to('/profile');
    }
}
