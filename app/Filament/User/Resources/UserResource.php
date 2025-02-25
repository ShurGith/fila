<?php
    
    namespace App\Filament\User\Resources;
    
    use App\Filament\User\Resources\UserResource\Pages;
    use App\Filament\User\Resources\UserResource\RelationManagers;
    use App\Models\User;
    use Auth;
    use Filament\Forms\Form;
    use Filament\Infolists\Components\TextEntry;
    use Filament\Infolists\Infolist;
    use Filament\Resources\Resource;
    use Filament\Tables;
    use Filament\Tables\Table;
    use Illuminate\Database\Eloquent\Builder;
    
    
    class UserResource extends Resource
    {
        protected static ?string $model = User::class;
        protected static ?string $navigationIcon = 'heroicon-o-user';
        protected static ?string $navigationGroup = 'Usuario';
        protected static ?int $navigationSort = 1;
        protected static ?string $modelLabel = 'Usuario';
        protected static ?string $pluralModelLabel = 'Perfil';
        protected static bool $hasTitleCaseModelLabel = false;
        
        public static function getEloquentQuery(): Builder
        {
            return parent::getEloquentQuery()->where('id', Auth::user()->id);
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
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('products_count')->counts([
                  'products' => fn(Builder $query) => $query->where('active', 1),
                ])->label('Activos'),
                Tables\Columns\TextColumn::make('email'),
                  //Tables\Columns\TextColumn::make('products_count')->counts('products')
              
              
              ])
              ->filters([
                  //
              ])
              ->actions([
                Tables\Actions\EditAction::make()
                  ->slideOver(),
                Tables\Actions\ViewAction::make()
                  ->slideOver(),
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
              'index' => Pages\ListUsers::route('/'),
                // 'create' => Pages\CreateUser::route('/create'),
                //'edit' => Pages\EditUser::route('/{record}/edit'),
            ];
        }
        
        public static function infolist(Infolist $infolist): Infolist
        {
            return $infolist
              ->schema([
                TextEntry::make('name'),
                TextEntry::make('email')
              ]);
        }
        
        public static function canCreate(): bool
        {
            return false; // Desactiva el botón "New User"
        }
    }
