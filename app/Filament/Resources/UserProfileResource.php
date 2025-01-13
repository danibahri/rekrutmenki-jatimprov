<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserProfileResource\Pages;
use App\Filament\Resources\UserProfileResource\RelationManagers;
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
use Filament\Tables\Actions\Action;
use Illuminate\Database\Eloquent\Builder;
use App\Models\UserProfile;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Date;
use Filament\Forms\Components\Select;
use Filament\Tables\Actions\ActionGroup;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

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
                    ->hidden()
                    ->label('NIK')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('kk')
                    ->hidden()
                    ->label('Nomor KK')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('user.nomor_tlp')
                    ->label('Nomor Telepon'),
                TextColumn::make('birth_place')
                    ->label('Tempat Lahir'),
                TextColumn::make('birth_date')
                    ->label('Tanggal Lahir')
                    ->date(),
                TextColumn::make('gender')
                    ->hidden()
                    ->label('Jenis Kelamin'),
                TextColumn::make('religion')
                    ->hidden()
                    ->label('Agama'),
                TextColumn::make('education')
                    ->hidden()
                    ->label('Pendidikan Terakhir'),
                TextColumn::make('marital_status')
                    ->hidden()
                    ->label('Status Perkawinan'),
                TextColumn::make('address')
                    ->hidden()
                    ->label('Alamat Lengkap'),
                TextColumn::make('pas_foto')
                    ->label('Pas Foto')
                    ->hidden()
                    ->formatStateUsing(fn ($state) => $state !== null ? '✓' : 'X'),
                TextColumn::make('registrasion_latter')
                    ->label('Surat Pendaftaran')
                    ->hidden()
                    ->formatStateUsing(fn ($state) => $state !== null ? '✓' : 'X'),
                TextColumn::make('ijazah')
                    ->label('SP Ijzah Terakhir')
                    ->hidden()
                    ->formatStateUsing(fn ($state) => $state !== null ? '✓' : 'X'),
                TextColumn::make('cv')
                    ->label('CV')
                    ->hidden()
                    ->formatStateUsing(fn ($state) => $state !== null ? '✓' : 'X'),
                TextColumn::make('health_letter')
                    ->label('SK Sehat & Bebas Narkoba')
                    ->hidden()
                    ->formatStateUsing(fn ($state) => $state !== null ? '✓' : 'X'),
                TextColumn::make('skck')
                    ->label('SKCK')
                    ->hidden()
                    ->formatStateUsing(fn ($state) => $state !== null ? '✓' : 'X'),
                TextColumn::make('non_criminal_statement')
                    ->label('SP Tidak Pernah Dipidana')
                    ->hidden()
                    ->formatStateUsing(fn ($state) => $state !== null ? '✓' : 'X'),
                TextColumn::make('non_party_statement')
                    ->label('SP Belum Pernah Terlibat Parpol')
                    ->hidden()
                    ->formatStateUsing(fn ($state) => $state !== null ? '✓' : 'X'),
                TextColumn::make('release_statement')
                    ->label('SP Melepas Jabatan')
                    ->hidden()
                    ->formatStateUsing(fn ($state) => $state !== null ? '✓' : 'X'),
                TextColumn::make('fulltime_statement')
                    ->label('SP Bersedia Bekerja Sepenuh Waktu')
                    ->hidden()
                    ->formatStateUsing(fn ($state) => $state !== null ? '✓' : 'X'),
                TextColumn::make('supervisor_permission')
                    ->label('Surat Izin Atasan')
                    ->hidden()
                    ->formatStateUsing(fn ($state) => $state !== null ? '✓' : 'X'),
                TextColumn::make('performance_letter')
                    ->label('SK Kinerja selama 2 thn')
                    ->hidden()
                    ->formatStateUsing(fn ($state) => $state !== null ? '✓' : 'X'),
            ])
            ->filters([
                //
            ])
            ->actions([
                ActionGroup::make([
                        Action::make('pas_foto')
                            ->label('Foto')
                            ->icon('heroicon-m-photo') 
                            ->url(fn ($record) => route('download.document', [
                                'type' => 'pas_foto',
                                'id' => $record->id
                            ]))
                            ->openUrlInNewTab()
                            ->visible(fn ($record) => $record->pas_foto !== null),
            
                        Action::make('registrasion_latter')
                            ->label('Surat Pendaftaran')
                            ->icon('heroicon-m-document-text')
                            ->url(fn ($record) => route('download.document', [
                                'type' => 'registrasion_latter',
                                'id' => $record->id
                            ]))
                            ->openUrlInNewTab()
                            ->visible(fn ($record) => $record->registrasion_latter !== null),
            
                        Action::make('ijazah')
                            ->label('Ijzah Terakhir')
                            ->icon('heroicon-m-academic-cap')  
                            ->url(fn ($record) => route('download.document', [
                                'type' => 'ijazah',
                                'id' => $record->id
                            ]))
                            ->openUrlInNewTab()
                            ->visible(fn ($record) => $record->ijazah !== null),
            
                        Action::make('cv')
                            ->label('CV')
                            ->icon('heroicon-m-document') 
                            ->url(fn ($record) => route('download.document', [
                                'type' => 'cv',
                                'id' => $record->id
                            ]))
                            ->openUrlInNewTab()
                            ->visible(fn ($record) => $record->cv !== null),

                        Action::make('health_letter')
                            ->label('SK Sehat & Bebas Narkoba')
                            ->icon('heroicon-m-document') 
                            ->url(fn ($record) => route('download.document', [
                                'type' => 'health_letter',
                                'id' => $record->id
                            ]))
                            ->openUrlInNewTab()
                            ->visible(fn ($record) => $record->health_letter !== null),
                            ])
                    ->label('Dokumen')
                    ->icon('heroicon-m-arrow-down-tray'),

                ActionGroup::make([
                    Action::make('skck')
                        ->label('SKCK')
                        ->icon('heroicon-m-document') 
                        ->url(fn ($record) => route('download.document', [
                            'type' => 'skck',
                            'id' => $record->id
                        ]))
                        ->openUrlInNewTab()
                        ->visible(fn ($record) => $record->skck !== null),

                    Action::make('non_criminal_statement')
                        ->label('SP Tidak Pernah Dipidana')
                        ->icon('heroicon-m-document') 
                        ->url(fn ($record) => route('download.document', [
                            'type' => 'non_criminal_statement',
                            'id' => $record->id
                        ]))
                        ->openUrlInNewTab()
                        ->visible(fn ($record) => $record->non_criminal_statement !== null),
                    
                    Action::make('non_party_statement')
                        ->label('SP Belum Pernah Terlibat Parpol')
                        ->icon('heroicon-m-document') 
                        ->url(fn ($record) => route('download.document', [
                            'type' => 'non_party_statement',
                            'id' => $record->id
                        ]))
                        ->openUrlInNewTab()
                        ->visible(fn ($record) => $record->non_party_statement !== null),
                    
                    Action::make('release_statement')
                        ->label('SP Melepas Jabatan')
                        ->icon('heroicon-m-document') 
                        ->url(fn ($record) => route('download.document', [
                            'type' => 'release_statement',
                            'id' => $record->id
                        ]))
                        ->openUrlInNewTab()
                        ->visible(fn ($record) => $record->release_statement !== null),
                    
                    Action::make('fulltime_statement')
                        ->label('SP Bersedia Bekerja Sepenuh Waktu')
                        ->icon('heroicon-m-document') 
                        ->url(fn ($record) => route('download.document', [
                            'type' => 'fulltime_statement',
                            'id' => $record->id
                        ]))
                        ->openUrlInNewTab()
                        ->visible(fn ($record) => $record->fulltime_statement !== null),

                    Action::make('supervisor_permission')
                        ->label('Surat Izin Atasan')
                        ->icon('heroicon-m-document') 
                        ->url(fn ($record) => route('download.document', [
                            'type' => 'supervisor_permission',
                            'id' => $record->id
                        ]))
                        ->openUrlInNewTab()
                        ->visible(fn ($record) => $record->supervisor_permission !== null),

                    Action::make('performance_letter')
                        ->label('SK Kinerja selama 2 thn')
                        ->icon('heroicon-m-document') 
                        ->url(fn ($record) => route('download.document', [
                            'type' => 'performance_letter',
                            'id' => $record->id
                        ]))
                        ->openUrlInNewTab()
                        ->visible(fn ($record) => $record->performance_letter !== null),   
                    ])
                    ->label('Dokumen')
                    ->icon('heroicon-m-arrow-down-tray'), 

                ActionGroup::make([
                    Action::make('pas_foto')
                        ->label('Foto')
                        ->icon('heroicon-m-photo') 
                        ->url(fn ($record) => route('view.document', [
                            'type' => 'pas_foto',
                            'id' => $record->id
                        ]))
                        ->openUrlInNewTab()
                        ->visible(fn ($record) => $record->pas_foto !== null),
        
                    Action::make('registrasion_latter')
                        ->label('Surat Pendaftaran')
                        ->icon('heroicon-m-document-text')
                        ->url(fn ($record) => route('view.document', [
                            'type' => 'registrasion_latter',
                            'id' => $record->id
                        ]))
                        ->openUrlInNewTab()
                        ->visible(fn ($record) => $record->registrasion_latter !== null),
        
                    Action::make('ijazah')
                        ->label('Ijzah Terakhir')
                        ->icon('heroicon-m-academic-cap')  
                        ->url(fn ($record) => route('view.document', [
                            'type' => 'ijazah',
                            'id' => $record->id
                        ]))
                        ->openUrlInNewTab()
                        ->visible(fn ($record) => $record->ijazah !== null),
        
                    Action::make('cv')
                        ->label('CV')
                        ->icon('heroicon-m-document') 
                        ->url(fn ($record) => route('view.document', [
                            'type' => 'cv',
                            'id' => $record->id
                        ]))
                        ->openUrlInNewTab()
                        ->visible(fn ($record) => $record->cv !== null),

                    Action::make('health_letter')
                        ->label('SK Sehat & Bebas Narkoba')
                        ->icon('heroicon-m-document') 
                        ->url(fn ($record) => route('view.document', [
                            'type' => 'health_letter',
                            'id' => $record->id
                        ]))
                        ->openUrlInNewTab()
                        ->visible(fn ($record) => $record->health_letter !== null),
                        ])
                    ->label('Dokumen')
                    ->icon('heroicon-m-eye'),

                ActionGroup::make([
                    Action::make('skck')
                        ->label('SKCK')
                        ->icon('heroicon-m-document') 
                        ->url(fn ($record) => route('view.document', [
                            'type' => 'skck',
                            'id' => $record->id
                        ]))
                        ->openUrlInNewTab()
                        ->visible(fn ($record) => $record->skck !== null),

                    Action::make('non_criminal_statement')
                        ->label('SP Tidak Pernah Dipidana')
                        ->icon('heroicon-m-document') 
                        ->url(fn ($record) => route('view.document', [
                            'type' => 'non_criminal_statement',
                            'id' => $record->id
                        ]))
                        ->openUrlInNewTab()
                        ->visible(fn ($record) => $record->non_criminal_statement !== null),
                    
                    Action::make('non_party_statement')
                        ->label('SP Belum Pernah Terlibat Parpol')
                        ->icon('heroicon-m-document') 
                        ->url(fn ($record) => route('view.document', [
                            'type' => 'non_party_statement',
                            'id' => $record->id
                        ]))
                        ->openUrlInNewTab()
                        ->visible(fn ($record) => $record->non_party_statement !== null),
                    
                    Action::make('release_statement')
                        ->label('SP Melepas Jabatan')
                        ->icon('heroicon-m-document') 
                        ->url(fn ($record) => route('view.document', [
                            'type' => 'release_statement',
                            'id' => $record->id
                        ]))
                        ->openUrlInNewTab()
                        ->visible(fn ($record) => $record->release_statement !== null),
                    
                    Action::make('fulltime_statement')
                        ->label('SK Bersedia Bekerja Sepenuh Waktu')
                        ->icon('heroicon-m-document') 
                        ->url(fn ($record) => route('view.document', [
                            'type' => 'fulltime_statement',
                            'id' => $record->id
                        ]))
                        ->openUrlInNewTab()
                        ->visible(fn ($record) => $record->fulltime_statement !== null),

                    Action::make('supervisor_permission')
                        ->label('Surat Izin Atasan')
                        ->icon('heroicon-m-document') 
                        ->url(fn ($record) => route('view.document', [
                            'type' => 'supervisor_permission',
                            'id' => $record->id
                        ]))
                        ->openUrlInNewTab()
                        ->visible(fn ($record) => $record->supervisor_permission !== null),

                    Action::make('performance_letter')
                        ->label('SK Kinerja selama 2 thn')
                        ->icon('heroicon-m-document') 
                        ->url(fn ($record) => route('view.document', [
                            'type' => 'performance_letter',
                            'id' => $record->id
                        ]))
                        ->openUrlInNewTab()
                        ->visible(fn ($record) => $record->performance_letter !== null),   
                    ])
                    ->label('Dokumen')
                    ->icon('heroicon-m-eye'), 
                Tables\Actions\ViewAction::make()
                    ->form([
                        TextInput::make('nik')
                            ->label('NIK')
                            ->maxLength(255),
                        TextInput::make('kk')
                            ->label('Nomor KK')
                            ->required(),
                        Select::make('gender')
                            ->label('Jenis Kelamin')
                            ->required()
                            ->options([
                                'L' => 'Laki-laki',
                                'P' => 'Perempuan',
                            ]),
                        TextInput::make('religion')
                            ->label('Agama')
                            ->required(),
                        Select::make('marital_status')
                            ->label('Status Perkawinan')
                            ->required()
                            ->options([
                                'Belum Kawin' => 'Belum Menikah',
                                'Kawin' => 'Sudah Menikah',
                                'Cerai' => 'Cerai',
                                'Cerai Mati' => 'Cerai Mati',
                                'Cerai Hidup' => 'Cerai Hidup',
                            ]),
                        RichEditor::make('address')
                            ->label('Alamat Lengkap')
                            ->required(),
                        RichEditor::make('education')
                            ->label('Pendidikan Terakhir')
                            ->required(),
                    ]),

            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    ExportBulkAction::make()
                        ->label('Export ke Excel')
                        ->icon('heroicon-o-document-arrow-down')
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
            // 'edit' => Pages\EditUserProfile::route('/{record}/edit')
            
        ];
    }
}
