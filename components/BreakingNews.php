<?php namespace PanatauSolusindo\BreakingNews\Components;

use Cms\Classes\ComponentBase;
use PanatauSolusindo\BreakingNews\Models\BreakingNews as BreakingNewsModel;
/**
 * BreakingNews Component
 */
class BreakingNews extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'Tampil BreakingNews',
            'description' => 'Tampilkan breaking news ...'
        ];
    }

    public function defineProperties()
    {
        return [
            'jumlahItem' => [
                'title' => 'Jumlah item',
                'description' => 'Jumlah item ditampilkan',
                'type' => 'string',
                'default' => '5'
            ],
        ];
    }

    public function onRun()
    {
        $this->page['daftarBreakingNews'] = BreakingNewsModel::tampil()
            ->skip(0)
            ->take((int)$this->property('jumlahItem', 5))
            ->get();
    }
}
