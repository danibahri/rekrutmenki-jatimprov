<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PersyaratanResource\Pages;
use App\Filament\Resources\PersyaratanResource\RelationManagers;
use App\Models\Persyaratan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PersyaratanResource extends Resource
{
    protected static ?string $model = Persyaratan::class;

    protected static ?string $navigationGroup = 'Manajemen Data';
    protected static ?string $navigationLabel = 'Persyaratan';
    protected static ?string $slug = 'manajemen-persyaratan';
    protected static ?string $label = 'Persyaratan';
    protected static ?string $navigationIcon = 'heroicon-o-square-3-stack-3d';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('heading')
                    ->label('Text')
                    ->required(),
                FileUpload::make('file_path')
                    ->label('Masukkan File Jika ada')
                    ->disk('public')
                    ->directory('file-berkas')
                    ->acceptedFileTypes(['application/pdf','application/msword','application/vnd.openxmlformats-officedocument.wordprocessingml.document','application/vnd.ms-excel','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet','image/jpeg','image/png'])
                    ->maxSize(30720) // Batas ukuran file 30MB (dalam KB)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('heading')
                    ->label('Judul'),
                TextColumn::make('file_path')
                    ->label('File'),
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
            'index' => Pages\ListPersyaratans::route('/'),
            'create' => Pages\CreatePersyaratan::route('/create'),
            'edit' => Pages\EditPersyaratan::route('/{record}/edit'),
        ];
    }
}
