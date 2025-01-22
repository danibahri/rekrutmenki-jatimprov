<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserProfileResource\Pages;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Actions\Action;
use App\Models\UserProfile;
use Filament\Tables\Columns\SelectColumn;
use Filament\Forms\Components\Select;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use Filament\Tables\Actions\BulkAction;
use Illuminate\Support\Facades\Storage;
use Filament\Notifications\Notification;
use ZipArchive;

class UserProfileResource extends Resource
{
    protected static ?string $model = UserProfile::class;

    protected static ?string $navigationLabel = 'Berkas Pendaftar';
    protected static ?string $label = 'Berkas Pendaftar';
    protected static ?string $navigationIcon = 'heroicon-o-folder';

    public static function canCreate(): bool
    {
        return false;
    }
    
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('full_name')
                    ->label('Nama Lengkap')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('nik')
                    ->label('NIK')                  
                    ->hidden()
                    ->sortable(),
                TextColumn::make('kk')
                    ->label('Nomor KK')
                    ->hidden()
                    ->sortable(),
                TextColumn::make('user.nomor_tlp')
                    ->label('Nomor Telepon')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('birth_place')
                    ->label('Tempat Lahir')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('birth_date')
                    ->label('Tanggal Lahir')
                    ->sortable()
                    ->searchable()
                    ->date(),
                SelectColumn::make('validation_status')
                    ->options([
                        'belum validasi' => 'Belum Divalidasi',
                        'direview' => 'Sedang Direview',
                        'diterima' => 'Diterima',
                        'ditolak' => 'Ditolak',
                    ])
                    ->searchable()
                    ->label('Status Validasi'),
                TextColumn::make('gender')
                    ->hidden()
                    ->label('Jenis Kelamin'),
                TextColumn::make('religion')
                    ->hidden()
                    ->label('Agama'),
                TextColumn::make('marital_status')
                    ->hidden()
                    ->label('Status Perkawinan'),
                TextColumn::make('address')
                    ->hidden()
                    ->label('Alamat Lengkap'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Action::make('download')
                    ->label('Download File')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->action(function ($record, $data) {
                        $persyaratanId = $data['persyaratan_id'];
                        $persyaratan = $record->persyaratans()->where('persyaratan_id', $persyaratanId)->first();
                        if (!$persyaratan) {
                            Notification::make()
                                ->title('Persyaratan tidak ditemukan.')
                                ->warning()
                                ->send();
                            return;
                        }
                        $filePath = $persyaratan->pivot->file_path_user;
                        if (!Storage::disk('private')->exists($filePath)) {
                            Notification::make()
                                ->title('File tidak ditemukan.')
                                ->danger()
                                ->send();
                            return;
                        }
                        return response()->download(storage_path('app/private/' . $filePath));
                    })
                    ->form([
                        Forms\Components\Select::make('persyaratan_id')
                            ->label('Pilih Persyaratan')
                            ->options(function ($record) {
                                return $record->persyaratans->pluck('heading', 'id');
                            })
                            ->required(),
                        ]),
                Tables\Actions\ViewAction::make()
                    ->form([
                        TextInput::make('full_name')
                            ->label('Nama Lengkap'),
                        TextInput::make('birth_place')
                            ->label('Tempat Lahir'),
                        DatePicker::make('birth_date')
                            ->label('Tanggal Lahir'),
                        TextInput::make('nik')
                            ->label('NIK')
                            ->maxLength(255),
                        TextInput::make('kk')
                            ->label('Nomor KK'),
                        Select::make('gender')
                            ->label('Jenis Kelamin')
                            ->options([
                                'L' => 'Laki-laki',
                                'P' => 'Perempuan',
                            ]),
                        TextInput::make('religion')
                            ->label('Agama'),
                        Select::make('marital_status')
                            ->label('Status Perkawinan')
                            ->options([
                                'Belum Kawin' => 'Belum Menikah',
                                'Kawin' => 'Sudah Menikah',
                                'Cerai' => 'Cerai',
                                'Cerai Mati' => 'Cerai Mati',
                                'Cerai Hidup' => 'Cerai Hidup',
                            ]),
                        RichEditor::make('address')
                            ->label('Alamat Lengkap'),
                        RichEditor::make('education')
                            ->label('Pendidikan Terakhir'),
                    ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    ExportBulkAction::make()
                        ->label('Export ke Excel')
                        ->icon('heroicon-o-document-arrow-down')
                    ]),
                    BulkAction::make('download_all')
                        ->label('Download Semua File Persyaratan User')
                        ->icon('heroicon-o-archive-box-arrow-down')
                        ->action(function ($records) {
                            $zip = new ZipArchive();
                            $zipFileName = 'persyaratan_'.time().'.zip';
                            $zipFilePath = storage_path('app/private/'.$zipFileName);
                            if ($zip->open($zipFilePath, ZipArchive::CREATE) !== true) {
                                Notification::make()
                                    ->title('Gagal membuat file ZIP.')
                                    ->danger()
                                    ->send();
                                return;
                            }
                            foreach ($records as $record) {
                                $userFolderName = 'user_' . $record->full_name; 
                                $zip->addEmptyDir($userFolderName); 
                                $persyaratan = $record->persyaratans;
                                foreach ($persyaratan as $item) {
                                    $filePath = $item->pivot->file_path_user;
                                    if (Storage::disk('private')->exists($filePath)) {
                                        $zip->addFile(storage_path('app/private/' . $filePath), $userFolderName . '/' . basename($filePath));
                                    }
                                }
                            }
                            $zip->close();
                            if (Storage::disk('private')->exists($zipFileName)) {
                                return response()->download($zipFilePath)->deleteFileAfterSend(true);
                            }
                            Notification::make()
                                ->title('Tidak ada file yang ditemukan untuk di-zip.')
                                ->warning()
                                ->send();
                        }),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUserProfiles::route('/'),
            'create' => Pages\CreateUserProfile::route('/create'),
            // 'edit' => Pages\EditUserProfile::route('/{record}/edit')
            
        ];
    }
}
