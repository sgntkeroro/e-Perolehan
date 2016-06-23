<?php

namespace frontend\models;

use Yii;
use yii\helpers\ArrayHelper;

class Model extends \yii\base\Model
{
    /**
     * Creates and populates a set of models.
     *
     * @param string $modelClass
     * @param array $multipleModels
     * @return array
     */
    public static function createMultiple($modelClass, $multipleModels = [])
    {
        $model    = new $modelClass;
        $formName = $model->formName();
        $post     = Yii::$app->request->post($formName);
        $models   = [];

        if (! empty($multipleModels)) {
            $keys = array_keys(ArrayHelper::map($multipleModels, 'alat_id', 'alat_id'));
            $multipleModels = array_combine($keys, $multipleModels);
        }

        if ($post && is_array($post)) {
            foreach ($post as $index => $item) {
                if (isset($item['alat_id']) && !empty($item['alat_id']) && isset($multipleModels[$item['alat_id']])) {
                    $models[] = $multipleModels[$item['alat_id']];
                } else {
                    $models[] = new $modelClass;
                }
            }
        }

        unset($model, $formName, $post);

        return $models;
    }

    public static function updateMultiple($modelClass, $multipleModels = [])
    {
        $model    = new $modelClass;
        $formName = $model->formName();
        $post     = Yii::$app->request->post($formName);
        $models   = [];

        if (! empty($multipleModels)) {
            $keys = array_keys(ArrayHelper::map($multipleModels, 'unit_id', 'unit_id'));
            $multipleModels = array_combine($keys, $multipleModels);
        }

        if ($post && is_array($post)) {
            foreach ($post as $i => $item) {
                if (isset($item['unit_id']) && !empty($item['unit_id']) && isset($multipleModels[$item['unit_id']])) {
                    $models[] = $multipleModels[$item['unit_id']];
                } else {
                    $models[] = new $modelClass;
                }
            }
        }

        unset($model, $formName, $post);

        return $models;
    }

    public static function createMultipleMesyuarat($modelClass, $multipleModels = [])
    {
        $model    = new $modelClass;
        $formName = $model->formName();
        $post     = Yii::$app->request->post($formName);
        $models   = [];

        if (! empty($multipleModels)) {
            $keys = array_keys(ArrayHelper::map($multipleModels, 'mesy_id', 'mesy_id'));
            $multipleModels = array_combine($keys, $multipleModels);
        }

        if ($post && is_array($post)) {
            foreach ($post as $index => $item) {
                if (isset($item['mesy_id']) && !empty($item['mesy_id']) && isset($multipleModels[$item['mesy_id']])) {
                    $models[] = $multipleModels[$item['mesy_id']];
                } else {
                    $models[] = new $modelClass;
                }
            }
        }

        unset($model, $formName, $post);

        return $models;
    }

    public static function createMultipleKehadiran($modelClass, $multipleModels = [])
    {
        $model    = new $modelClass;
        $formName = $model->formName();
        $post     = Yii::$app->request->post($formName);
        $models   = [];

        if (! empty($multipleModels)) {
            $keys = array_keys(ArrayHelper::map($multipleModels, 'hadir_id', 'hadir_id'));
            $multipleModels = array_combine($keys, $multipleModels);
        }

        if ($post && is_array($post)) {
            foreach ($post as $indexHadir => $item) {
                if (isset($item['hadir_id']) && !empty($item['hadir_id']) && isset($multipleModels[$item['hadir_id']])) {
                    $models[] = $multipleModels[$item['hadir_id']];
                } 
                else {
                    $models[] = new $modelClass;
                }
            }
        }

        unset($model, $formName, $post);

        return $models;
    }

    public static function createMultiplePerkara($modelClass, $multipleModels = [])
    {
        $model    = new $modelClass;
        $formName = $model->formName();
        $post     = Yii::$app->request->post($formName);
        $models   = [];

        if (! empty($multipleModels)) {
            $keys = array_keys(ArrayHelper::map($multipleModels, 'perkara_id', 'perkara_id'));
            $multipleModels = array_combine($keys, $multipleModels);
        }

        if ($post && is_array($post)) {
            foreach ($post as $indexPerkaraSatu => $item) {
                if (isset($item['perkara_id']) && !empty($item['perkara_id']) && isset($multipleModels[$item['perkara_id']])) {
                    $models[] = $multipleModels[$item['perkara_id']];
                } else {
                    $models[] = new $modelClass;
                }
            }
        }

        unset($model, $formName, $post);

        return $models;
    }
}
