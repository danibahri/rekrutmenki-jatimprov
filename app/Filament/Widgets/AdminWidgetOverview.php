<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget\IconPosition;
use App\Models\User;
use App\Models\UserProfile;

class AdminWidgetOverview extends BaseWidget
{
    protected static ?string $pollingInterval = '1s';
    protected function getStats(): array
    {
        $totalUsers = User::where('role', 'user')->count();
        $recentUsers = User::where('role', 'user')
            ->whereMonth('created_at', now()->month)
            ->count();
        $currentTime = now()->format('d M Y');
        $currentTime2 = now()->format('H:i:s');
        $berkas_terkumpul = UserProfile::all()->count();
        return [
            Stat::make('Tanggal', $currentTime)
                ->description('Server Time')
                ->descriptionIcon('heroicon-m-clock')
                ->color('success'),
            Stat::make('Jam', $currentTime2)
                ->description('Server Time')
                ->descriptionIcon('heroicon-m-clock')
                ->color('success'),
            Stat::make('Total Pendaftar', $totalUsers)
                ->description($recentUsers . ' pengguna baru bulan ini')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success')
                ->chart([7, 2, 10, 3, 15, 4, 17]),
            Stat::make('Pengajuan', $berkas_terkumpul)
                ->description('yang telah mengajukan berkas dari '.$totalUsers.' yang mendaftar')
                ->descriptionIcon('heroicon-m-folder')
                ->color('warning'),
                
        ];
    }
}
