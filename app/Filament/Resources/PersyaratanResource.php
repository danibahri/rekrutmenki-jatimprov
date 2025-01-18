<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PersyaratanResource\Pages;
use App\Filament\Resources\PersyaratanResource\RelationManagers;
use App\Models\Persyaratan;
use Faker\Core\File;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\SelectColumn;

class PersyaratanResource extends Resource
{
    protected static ?string $model = Persyaratan::class;
    protected static ?string $navigationLabel = 'Persyaratan';
    protected static ?string $slug = 'manajemen-persyaratan';
    protected static ?string $label = 'Persyaratan';
    protected static ?string $navigationIcon = 'heroicon-o-square-3-stack-3d';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('heading')
                    ->label('Judul Form')
                    ->required(),
                TextInput::make('description')
                    ->label('Deskripsi Persyaratan')
                    ->required(),
                Select::make('status')
                    ->label('Status')
                    ->options([
                        'wajib' => 'Wajib',
                        'pendukung' => 'Tidak Wajib',
                    ])
                    ->default('active'),
                Select::make('max_size')
                    ->label('Ukuran Maksimal File')
                    ->options([
                        1024 => '1 MB',
                        2048 => '2 MB',
                        3072 => '3 MB',
                        4096 => '4 MB',
                        5120 => '5 MB',
                        10240 => '10 MB',
                        20480 => '20 MB',
                        30720 => '30 MB',
                        40960 => '40 MB',
                        51200 => '50 MB',
                    ])
                    ->required(),
                Select::make('accepted_file_types')
                    ->label('Tipe File yang Diterima')
                    ->options([
                        '.pdf' => 'PDF',
                        '.doc' => 'DOC',
                        '.docx' => 'DOCX',
                        '.xls' => 'XLS',
                        '.xlsx' => 'XLSX',
                        '.jpg' => 'JPG',
                        '.png' => 'PNG',
                    ])
                    ->multiple()
                    ->required(),
                FileUpload::make('file_path')
                    ->label('Masukkan File Template Persyaratan Jika ada')
                    ->columnSpan(2)
                    ->disk('public')
                    ->directory('persyaratan')
                    ->acceptedFileTypes([
                        'application/pdf',         
                        'application/msword',        
                        'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 
                        'application/vnd.ms-excel', 
                        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',      
                        'image/jpeg',                
                        'image/png'                   
                    ])
                    ->preserveFilenames()
                    ->helperText('Format: PDF, DOC, DOCX, XLS, XLSX, JPG, PNG (Max 30MB)')
                    ->maxSize(30720),
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('heading')
                    ->label('Judul Formulir'),
                TextColumn::make('file_path')
                    ->label('File Template'),
                TextColumn::make('description')
                    ->label('Deskripsi Persyaratan')
                    ->limit(20),
                SelectColumn::make('status')
                    ->options([
                        'wajib' => 'Wajib',
                        'pendukung' => 'Tidak Wajib',
                    ])
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
