<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HomeResource\Pages;
use App\Models\Home;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;


class HomeResource extends Resource
{
    protected static ?string $model = Home::class;
    protected static ?string $navigationLabel = 'Home';
    protected static ?string $slug = 'manajemen-landing-page';
    protected static ?string $label = 'Landing Page';
    protected static ?string $navigationGroup = 'Manajemen Data';
    protected static ?string $navigationIcon = 'heroicon-o-home';

    public static function getNavigationSort(): ?int
    {
        return 1;
    }

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
                    ->columnSpan(2)
                    ->required(),
                TextArea::make('summary')
                    ->label('Konten')
                    ->placeholder('Masukkan Konten Untuk Landing Page')
                    ->columnSpan(2)
                    ->required(),
                DateTimePicker::make('open_pendaftaran')
                    ->label('Tanggal Pendaftaran Dibuka')
                    ->required()
                    ->afterStateUpdated(function ($state, callable $set, $record) {
                        if ($state && $record?->exp_pendaftaran) {
                            if (strtotime($state) > strtotime($record->exp_pendaftaran)) {
                                $set('exp_pendaftaran', $state);
                            }
                        }
                    })
                    ->rules([
                        fn ($record) => function ($attribute, $value, $fail) use ($record) {
                            if ($record && $record->exp_pendaftaran) {
                                if (strtotime($value) > strtotime($record->exp_pendaftaran)) {
                                    $fail('Tanggal pembukaan tidak boleh melebihi tanggal penutupan.');
                                }
                            }
                        }
                    ]),
                
                DateTimePicker::make('exp_pendaftaran')
                    ->label('Tanggal Pendaftaran Ditutup')
                    ->required()
                    ->rules([
                        fn ($record) => function ($attribute, $value, $fail) use ($record) {
                            if ($record && $record->open_pendaftaran) {
                                if (strtotime($value) < strtotime($record->open_pendaftaran)) {
                                    $fail('Tanggal penutupan tidak boleh kurang dari tanggal pembukaan.');
                                }
                            }
                        }
                    ])
                    ->after('open_pendaftaran'), 
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
                        $now = now();
                        if ($record->open_pendaftaran <= $now && $now <= $record->exp_pendaftaran) {
                            return 'success';
                        }
                        return 'warning';
                    })
                    ->formatStateUsing(function ($record) {
                        $now = now(); 
                        if ($record->open_pendaftaran <= $now && $now <= $record->exp_pendaftaran) {
                            return 'open';
                        }
                        return 'closed'; 
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
