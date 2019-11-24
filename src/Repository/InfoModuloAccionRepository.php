<?php

namespace App\Repository;
use Doctrine\ORM\Query\ResultSetMappingBuilder;
/**
 * InfoModuloAccionRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class InfoModuloAccionRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * Documentación para la función 'getModuloAccionCriterio'
     * Método encargado de listar los modulos y acciones relacionados, según los parámetros recibidos.
     * 
     * @author Kevin Baque
     * @version 1.0 05-10-2019
     * 
     */
    public function getModuloAccionCriterio($arrayParametros)
    {
        $intIdModuloAccion  = $arrayParametros['intIdModuloAccion'] ? $arrayParametros['intIdModuloAccion']:'';
        $intIdModulo        = $arrayParametros['intIdModulo'] ? $arrayParametros['intIdModulo']:'';
        $intIdAccion        = $arrayParametros['intIdAccion'] ? $arrayParametros['intIdAccion']:'';
        $strEstado          = $arrayParametros['strEstado'] ? $arrayParametros['strEstado']:array('ACTIVO','INACTIVO','ELIMINADO');
        $arrayModuloAccion        = array();
        $strMensajeError    = '';
        $objRsmBuilder      = new ResultSetMappingBuilder($this->_em);
        $objQuery           = $this->_em->createNativeQuery(null, $objRsmBuilder);
        $objRsmBuilderCount = new ResultSetMappingBuilder($this->_em);
        $objQueryCount      = $this->_em->createNativeQuery(null, $objRsmBuilderCount);
        try
        {
            $strSelect      = "SELECT IMA.ID_MODULO_ACCION,AC.ID_ACCION,AC.DESCRIPCION AS DESCRIPCION_ACCION,AM.ID_MODULO,AM.DESCRIPCION AS DESCRIPCION_MODULO ";
            $strSelectCount = "SELECT COUNT(*) AS CANTIDAD ";
            $strFrom        = "FROM INFO_MODULO_ACCION  IMA 
                               JOIN ADMI_ACCION  AC ON AC.ID_ACCION  = IMA.ACCION_ID
                               JOIN ADMI_MODULO  AM ON AM.ID_MODULO  = IMA.MODULO_ID ";
            $strWhere       = "WHERE IMA.ESTADO in (:ESTADO) ";
            $objQuery->setParameter("ESTADO",$strEstado);
            $objQueryCount->setParameter("ESTADO",$strEstado);
            if(!empty($intIdModuloAccion))
            {
                $strWhere .= " AND IMA.ID_MODULO_ACCION =:ID_MODULO_ACCION";
                $objQuery->setParameter("ID_MODULO_ACCION", $intIdModuloAccion);
                $objQueryCount->setParameter("ID_MODULO_ACCION", $intIdModuloAccion);
            }
            if(!empty($intIdModulo))
            {
                $strWhere .= " AND AM.ID_MODULO =:ID_MODULO";
                $objQuery->setParameter("ID_MODULO", $intIdModulo);
                $objQueryCount->setParameter("ID_MODULO", $intIdModulo);
            }
            if(!empty($intIdAccion))
            {
                $strWhere .= " AND AC.ID_ACCION =:ID_ACCION";
                $objQuery->setParameter("ID_ACCION", $intIdAccion);
                $objQueryCount->setParameter("ID_ACCION", $intIdAccion);
            }
            $objRsmBuilder->addScalarResult('ID_MODULO_ACCION', 'ID_MODULO_ACCION', 'string');
            $objRsmBuilder->addScalarResult('ID_ACCION', 'ID_ACCION', 'string');
            $objRsmBuilder->addScalarResult('DESCRIPCION_ACCION', 'DESCRIPCION_ACCION', 'string');
            $objRsmBuilder->addScalarResult('ID_MODULO', 'ID_MODULO', 'string');
            $objRsmBuilder->addScalarResult('DESCRIPCION_MODULO', 'DESCRIPCION_MODULO', 'string');
            $objRsmBuilderCount->addScalarResult('CANTIDAD', 'Cantidad', 'integer');
            $strSql       = $strSelect.$strFrom.$strWhere;
            $objQuery->setSQL($strSql);
            $strSqlCount  = $strSelectCount.$strFrom.$strWhere;
            $objQueryCount->setSQL($strSqlCount);
            $arrayModuloAccion['cantidad']   = $objQueryCount->getSingleScalarResult();
            $arrayModuloAccion['resultados'] = $objQuery->getResult();
        }
        catch(\Exception $ex)
        {
            $strMensajeError = $ex->getMessage();
        }
        $arrayModuloAccion['error'] = $strMensajeError;
        return $arrayModuloAccion;
    }
}