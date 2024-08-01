<?php

namespace JeffreyVanHees\ScrambleModelStates;

use Dedoc\Scramble\Extensions\TypeToSchemaExtension;
use Dedoc\Scramble\Support\Generator\Reference;
use Dedoc\Scramble\Support\Generator\Types\IntegerType;
use Dedoc\Scramble\Support\Generator\Types\StringType;
use Dedoc\Scramble\Support\Generator\Types\UnknownType;
use Dedoc\Scramble\Support\Type\ObjectType;
use Dedoc\Scramble\Support\Type\Type;
use Spatie\ModelStates\State;

class ModelStateToSchema extends TypeToSchemaExtension
{
    public function shouldHandle(Type $type): bool
    {
        return $type instanceof ObjectType
            && $type->isInstanceOf(State::class);
    }

    /**
     * @param ObjectType $type
     */
    public function toSchema(Type $type): UnknownType|IntegerType|StringType
    {
        $name = $type->name;

        if (!isset($name::all()->keys()->toArray()[0])) {
            return new UnknownType();
        }

        $values = $name::all()->keys()->toArray();

        $schemaType = is_string($values[0]) ? new StringType : new IntegerType;
        $schemaType->enum($values);

        return $schemaType;
    }

    public function reference(ObjectType $type): Reference
    {
        return new Reference('schemas', $type->name, $this->components);
    }
}
