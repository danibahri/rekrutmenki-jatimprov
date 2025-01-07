<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HomeResource\Pages;
use App\Filament\Resources\HomeResource\RelationManagers;
use App\Models\Home;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Forms\Components\TextArea;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\ToggleButtons;

class HomeResource extends Resource
{
    protected static ?string $model = Home::class;

    // Nama menu atau label
    protected static ?string $navigationLabel = 'Home';
    protected static ?string $slug = 'manajemen-landing-page';
    protected static ?string $label = 'Landing Page';
    protected static ?string $navigationGroup = 'Manajemen Data';
    protected static ?string $navigationIcon = 'heroicon-o-home';

    public static function canCreate(): bool
    {
        return false;
    }   

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('heading')
                    ->label('Judul')
                    ->placeholder('Masukkan Judul Untuk Header Landing Page')
                    ->required(),
                Select::make('status')
                    ->label('Status')
                    ->options([
                        'open' => 'Dibuka',
                        'closed' => 'Ditutup',
                    ])
                    ->default('draft')
                    ->required(),
                TextArea::make('summary')
                    ->label('Konten')
                    ->placeholder('Masukkan Konten Untuk Landing Page')
                    ->columnSpan(2)
                    ->required(),
                DateTimePicker::make('open_pendaftaran')
                    ->label('Tanggal Pendaftaran Dibuka')
                    ->required(),
                DateTimePicker::make('exp_pendaftaran')
                    ->label('Tanggal Pendaftaran Ditutup')
                    ->required(),
                TextInput::make('email')
                    ->label('Email')
                    ->placeholder('Masukkan Email')
                    ->email()
                    ->required(),
                TextInput::make('alamat')
                    ->label('Alamat')
                    ->placeholder('Masukkan Alamat')
                    ->required(),
                TextInput::make('telepon')
                    ->label('Telepon')
                    ->placeholder('Masukkan Telepon')
                    ->integer()
                    // ->step(15)
                    ->required(),
                ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('heading')
                    ->label('Judul')
                    ->sortable(),
                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(function ($record) {
                        $now = now(); // Waktu saat ini
                        if ($record->open_pendaftaran <= $now && $now <= $record->exp_pendaftaran) {
                            return 'success'; // Warna hijau untuk status "open"
                        }
                        return 'warning'; // Warna merah untuk status "closed"
                    })
                    ->formatStateUsing(function ($record) {
                        $now = now(); // Waktu saat ini
                        if ($record->open_pendaftaran <= $now && $now <= $record->exp_pendaftaran) {
                            return 'open'; // Tampilkan status "open"
                        }
                        return 'closed'; // Tampilkan status "closed"
                    }),
                TextColumn::make('open_pendaftaran')
                    ->label('Pendaftaran Dibuka')
                    ->dateTime(),
                TextColumn::make('exp_pendaftaran')
                    ->label('Pendaftaran Ditutup')
                    ->dateTime(),
                TextColumn::make('email')
                    ->label('Email'),
                TextColumn::make('telepon')
                    ->label('Telepon'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListHomes::route('/'),
            'create' => Pages\CreateHome::route('/create'),
            'edit' => Pages\EditHome::route('/{record}/edit'),
        ];
    }
}
