<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TaskResource\Pages;
use App\Models\Status;
use App\Models\Task;
use Filament\Forms;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class TaskResource extends Resource
{
    protected static ?string $model = Task::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Kegiatan')
                    ->required()
                    ->autofocus()
                    ->maxLength(255),
                Forms\Components\TextInput::make('location')
                    ->label('Lokasi')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('in_charge')
                    ->label('PIC (Person in Charge)')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('attendees')
                    ->label('Dihadiri')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Select::make('status_id')
                    ->label('Status')
                    ->required()
                    ->default(1)
                    ->selectablePlaceholder(false)
                    ->relationship('status', 'name', fn (Builder $query) => $query->orderBy('id')),
                Forms\Components\DatePicker::make('start_date')
                    ->label('Tanggal')
                    ->prefix('Mulai')
                    ->format('d/m/Y')
                    ->required(),
                Forms\Components\TimePicker::make('start_time')
                    ->label('Waktu Mulai')
                    ->prefix('Jam')
                    ->seconds(false)
                    ->required(),
                Forms\Components\TimePicker::make('end_time')
                    ->label('Waktu Selesai')
                    ->prefix('Jam')
                    ->seconds(false)
                    ->required(),
                Forms\Components\Select::make('user_id')
                    ->label('Pembuat Acara')
                    ->required(false)
                    ->relationship('user', 'name'),
                Hidden::make('admin_user_id')->default(auth()->user()->id),
                Select::make('tags')
                    ->multiple()
                    ->preload()
                    ->relationship('tags', 'name'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->description(fn (Task $record): string => $record->description)
                    ->searchable(),
                Tables\Columns\TextColumn::make('location')
                    ->label('Lokasi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('in_charge')
                    ->label('PIC')
                    ->searchable(),
                Tables\Columns\TextColumn::make('attendees')
                    ->label('Dihadiri'),
                Tables\Columns\TextColumn::make('start_date')
                ->label('Tanggal')
                    ->date()->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('start_time')
                    ->label('Waktu (mulai)')
                    // ->dateFormat('h:i') error filament namun data bisa terubah di mysql
                    ->time(),
                Tables\Columns\TextColumn::make('end_time')
                    ->label('Waktu (selesai)')
                    ->time(),
                SelectColumn::make('status_id')
                    ->label('Status')
                    ->rules(['required'])
                    ->selectablePlaceholder(false)
                    ->options(Status::pluck('name', 'id')),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Assigned To')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('tags.name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('Assigned To')
                    ->relationship('user', 'name')
                    ->searchable()
                    ->preload(),
                SelectFilter::make('Status')
                    ->relationship('status', 'name')
                    ->searchable()
                    ->preload(),
                SelectFilter::make('Tag')
                    ->relationship('tags', 'name')
                    ->searchable()
                    ->preload(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                Tables\Actions\DeleteBulkAction::make(),
                // ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
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
            'index' => Pages\ListTasks::route('/'),
            'create' => Pages\CreateTask::route('/create'),
            'edit' => Pages\EditTask::route('/{record}/edit'),
        ];
    }

    public function getHeading(): string
    {
        return __('Custom Page Heading');
    }
}
