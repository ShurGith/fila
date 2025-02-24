<?php
    
    namespace App\Filament\Resources;
    
    use App\Filament\Resources\ProductResource\Pages;
    use App\Models\Product;
    use Filament\Forms;
    use Filament\Forms\Components\Repeater;
    use Filament\Forms\Components\Split;
    use Filament\Forms\Components\TextInput;
    use Filament\Forms\Form;
    use Filament\Forms\Get;
    use Filament\Resources\Resource;
    use Filament\Tables;
    use Filament\Tables\Table;
    use FilamentTiptapEditor\Enums\TiptapOutput;
    use FilamentTiptapEditor\TiptapEditor;
    use Illuminate\Database\Eloquent\Model;
    
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
                    ->visible(fn(Get $get): bool => $get('oferta')),
                ]),
                TiptapEditor::make('description')
                  ->profile('default')
                  ->output(TiptapOutput::Html)
                  ->columnSpanFull(),
                Forms\Components\FileUpload::make('images')
                  ->columnSpanFull()
                  ->multiple(),
                
                Repeater::make('features')
                  ->label('Titulo')
                  ->relationship('featuretitle') // Relación con el modelo Post
                  ->schema([
                    TextInput::make('title')->required()->label('nombre'),
                    Repeater::make('features')
                      ->label('Texto')
                      ->required()
                      ->relationship('featureproducts')
                      ->schema([
                        Forms\Components\RichEditor::make('feature')
                      ])
                  ])
                  ->label('Detalles')
                  ->columns(2)
                  ->columnSpanFull(),
                
                Forms\Components\CheckboxList::make('Categorias')
                  ->relationship('categories', 'name')
                  ->getOptionLabelFromRecordUsing(fn(Model $record
                  ) => "{$record->id} {$record->name} ")
                  ->live(),
                Forms\Components\CheckboxList::make('Etiquetas')
                  ->label('Etiquetas')
                  ->relationship('tags')
                  ->visible(fn(Get $get) => empty($get('categories')))
                  ->getOptionLabelFromRecordUsing(fn(Model $record
                  ) => "{$record->category_id} {$record->name}")
                  ->columns(4)
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
                Tables\Columns\TextColumn::make('categories.name')
                  ->label('Categorias')
                  ->badge()
                  ->color('success'),
                Tables\Columns\TextColumn::make('tags.name')
                  ->label('Etiquetas')
                  ->badge(),
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
                Tables\Actions\EditAction::make()
                  // ->slideOver(),
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
                //  ProductResource\RelationManagers\FeaturesRelationManager::class,
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
