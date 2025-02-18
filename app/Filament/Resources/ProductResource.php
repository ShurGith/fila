<?php
    
    namespace App\Filament\Resources;
    
    use App\Filament\Resources\ProductResource\Pages;
    use App\Filament\Resources\ProductResource\RelationManagers;
    use App\Models\Category;
    use App\Models\Product;
    use App\Models\Tag;
    use Filament\Forms;
    use Filament\Forms\Components\Group;
    use Filament\Forms\Components\Split;
    use Filament\Forms\Form;
    use Filament\Forms\Get;
    use Filament\Resources\Resource;
    use Filament\Tables;
    use Filament\Tables\Table;
    use Illuminate\Support\Collection;
    
    class ProductResource extends Resource
    {
        protected static ?string $model = Product::class;
        
        protected static ?string $navigationIcon = 'heroicon-o-building-storefront';
        protected static ?string $navigationGroup = 'Productos';
        protected static ?string $modelLabel = 'producto';
        protected static ?string $navigationLabel = 'Productos en venta';
        public Catprod $category;
        
        public static function form(Form $form): Form
        {
            return $form
              ->schema([
                Forms\Components\TextInput::make('name')
                  ->label('Producto')
                  ->required()
                  ->maxLength(255),
                Split::make([
                  Forms\Components\Toggle::make('oferta')
                    ->live(),
                  Forms\Components\Toggle::make('active')
                    ->label('Activo'),
                    ]),
                Split::make([
                  Forms\Components\Select::make('user_id')
                        ->relationship('user', 'name')
                        ->label('Vendedor')
                        ->columnSpan(2)
                        ->required(),
                  Forms\Components\TextInput::make('price')
                        ->numeric()
                        ->columnSpan(2)
                        ->prefix('$'),
                  Forms\Components\TextInput::make('descuento')
                      ->numeric()
                      ->columnSpan(6)
                      ->visible(fn (Get $get): bool =>  $get('oferta')),
                  ]),
                Forms\Components\RichEditor::make('description')
                  ->columnSpanFull(),
                Forms\Components\Select::make('category')
                  ->options(Category::query()->pluck('name', 'id'))
                  ->live(),
                Forms\Components\Select::make('sub_category')
                  ->multiple()
                    ->options(fn (Get $get): Collection => Tag::query()
                    ->where('category_id', $get('category'))
                    ->pluck('name', 'id'))
              ]);
        }
        
        public static function table(Table $table): Table
        {
            return $table
              ->columns([
                Tables\Columns\TextColumn::make('name')
                  ->searchable(),
                Tables\Columns\TextColumn::make('price')
                  ->label('Precio')
                  ->money('EUR', divideBy: 100, locale: 'es')
                  ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
                  ->label('Vendedor')
                  ->sortable(),
                Tables\Columns\ToggleColumn::make('active')
                  ->label('En Venta'),
                Tables\Columns\ToggleColumn::make('oferta'),
                Tables\Columns\TextColumn::make('descuento')
                  ->label('Descuento')
                  ->numeric()
                  ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
                  ->numeric()
                  ->sortable(),
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
                  //
              ])
              ->actions([
                Tables\Actions\EditAction::make(),
                  //->slideOver(),
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
                //  RelationManagers\CatprodsRelationManager::class,
                //  RelationManagers\UserRelationManager::class,
            ];
        }
        
        public static function getPages(): array
        {
            return [
              'index' => Pages\ListProducts::route('/'),
              'create' => Pages\CreateProduct::route('/create'),
              'edit' => Pages\EditProduct::route('/{record}/edit'),
            ];
        }
    }
