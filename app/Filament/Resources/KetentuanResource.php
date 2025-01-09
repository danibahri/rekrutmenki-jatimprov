<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KetentuanResource\Pages;
use App\Filament\Resources\KetentuanResource\RelationManagers;
use App\Models\Ketentuan;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KetentuanResource extends Resource
{
    protected static ?string $model = Ketentuan::class;
    protected static ?string $navigationGroup = 'Manajemen Data';
    protected static ?string $navigationLabel = 'Ketentuan';
    protected static ?string $slug = 'manajemen-ketentuan';
    protected static ?string $label = 'Ketentuan';
    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';

    public static function getNavigationSort(): ?int
    {
        return 4;
    }

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
            'index' => Pages\ListKetentuans::route('/'),
            'create' => Pages\CreateKetentuan::route('/create'),
            'edit' => Pages\EditKetentuan::route('/{record}/edit'),
        ];
    }
}
