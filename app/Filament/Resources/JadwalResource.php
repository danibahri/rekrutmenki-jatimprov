<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JadwalResource\Pages;
use App\Filament\Resources\JadwalResource\RelationManagers;
use App\Models\Alurpendaftaran;
use App\Models\Jadwal;
use DateTime;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JadwalResource extends Resource
{
    protected static ?string $model = Alurpendaftaran::class;

    protected static ?string $navigationLabel = 'Jadwal';
    protected static ?string $slug = 'manajemen-jadwal';
    protected static ?string $label = 'Jadwal';
    protected static ?string $navigationGroup = 'Manajemen Data';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationSort(): ?int
    {
        return 2;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('heading')
                    ->label('Judul')
                    ->required(),
                DatePicker::make('date')
                    ->label('Date')
                    ->required(),
                TextInput::make('summary')
                    ->label('Konten')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('heading')
                    ->label('Judul'),
                TextColumn::make('date')
                    ->label('Tanggal')
                    ->date(),
                TextColumn::make('summary')
                    ->label('Konten'),
                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->since()
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListJadwals::route('/'),
            'create' => Pages\CreateJadwal::route('/create'),
            'edit' => Pages\EditJadwal::route('/{record}/edit'),
        ];
    }
}
