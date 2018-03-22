<?php

namespace app\controllers;

use app\models\Aeropuertos;
use app\models\AeropuertosSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * AeropuertosController implements the CRUD actions for Aeropuertos model.
 */
class AeropuertosController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Aeropuertos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AeropuertosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Aeropuertos model.
     * @param int $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Aeropuertos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Aeropuertos();// Crea una nueva instancia del modelo aeropuertos

        //Load carga masivamente los datos que vienen por post y rellena el modelo con ellos. True si carga algo en el modelo.
        //Save hace un validate de los datos que se han grabado en el modelo y graba en la bd.
        if ($model->load(Yii::$app->request->post()) && $model->save()) { //Cuando se pulsa save, se ejecuta las condiciones que hay en el if
            return $this->redirect(['view', 'id' => $model->id]);//Redirect siempre espera un array, cuyo primer parámetro del array es la ruta. Siguientes valores son clave => valor
        }

        //Si hay errores se vuelve a pintar la vista create con los errores incluidos en el ActiveForm
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Aeropuertos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Aeropuertos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Aeropuertos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id
     * @return Aeropuertos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Aeropuertos::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
