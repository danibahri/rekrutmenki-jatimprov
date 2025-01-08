<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserProfileResource\Pages;
use App\Filament\Resources\UserProfileResource\RelationManagers;
use App\Models\UserProfile;
use Faker\Provider\ar_EG\Text;
use Filament\Actions\ViewAction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Columns\ViewColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Date;
use Filament\Forms\Components\Select;

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
                TextColumn::make('birth_place')
                    ->label('Tempat Lahir'),
                TextColumn::make('birth_date')
                    ->label('Tanggal Lahir')
                    ->date(),
                TextColumn::make('nationality')
                    ->label('Negara'),
                TextColumn::make('phone_number')
                    ->label('Nomor Telepon'),
                // FileUpload::make('ktp_scan_path')
                //     ->label('Scan KTP')
                //     ->disk('private')
                //     ->downloadable()
                //     ->required(),
                ViewColumn::make('ktp_scan_path')
                    ->label('Scan KTP')
                    ->view('components.ktp-scan'),
                ViewColumn::make('kk_scan_path')
                    ->label('Scan KK')
                    ->view('components.kk-scan')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->form([
                        TextInput::make('nik')
                            ->label('NIK')
                            ->maxLength(255),
                        TextInput::make('kk_number')
                            ->label('Nomor KK')
                            ->required(),
                        Select::make('gender')
                            ->label('Jenis Kelamin')
                            ->required()
                            ->options([
                                'male' => 'Laki-laki',
                                'female' => 'Perempuan',
                            ]),
                        TextInput::make('religion')
                            ->label('Agama')
                            ->required(),
                        Select::make('marital_status')
                            ->label('Status Perkawinan')
                            ->required()
                            ->options([
                                'single' => 'Belum Menikah',
                                'merried' => 'Sudah Menikah',
                                'divorced' => 'Cerai',
                                'widowed' => 'Janda',
                            ]),
                        RichEditor::make('current_address')
                            ->label('Alamat Domisili')
                            ->required(),
                        RichEditor::make('permanent_address')
                            ->label('Alamat Asal')
                            ->required(),
                        

                    ]),

            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'edit' => Pages\EditUserProfile::route('/{record}/edit'),
        ];
    }
}
