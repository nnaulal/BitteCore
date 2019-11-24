<?php

namespace App\Repository;
use Doctrine\ORM\Query\ResultSetMappingBuilder;
/**
 * AdmiParroquiaRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class AdmiParroquiaRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * Documentación para la función 'getParroquia'.
     * Método encargado de retornar todos las parroquias según los parámetros enviados.
     * 
     * @author Kevin Baque
     * @version 1.0 16-07-2019
     * 
     * @return array  $arrayParroquia
     * 
     */
    public function getParroquia($arrayParametros)
    {
        $strEstado       = $arrayParametros['estado'] ? $arrayParametros['estado']:array('ACTIVO','INACTIVO','ELIMINADO');
        $strCiudad       = $arrayParametros['idCiudad'] ? $arrayParametros['idCiudad']:'';
        $intIdParroquia  = $arrayParametros['idParroquia'] ? $arrayParametros['idParroquia']:'';
        $arrayParroquia  = array();
        $objRsmBuilder   = new ResultSetMappingBuilder($this->_em);
        $objQuery        = $this->_em->createNativeQuery(null, $objRsmBuilder);
        $strMensajeError = '';
        $strSelect       = '';
        $strFrom         = '';
        $strWhere        = '';
        $strOrder        = 'ORDER BY parroquia.PARROQUIA_NOMBRE ASC';
        try
        {
            $strSelect = "SELECT parroquia.ID_PARROQUIA,parroquia.CIUDAD_ID,parroquia.PARROQUIA_NOMBRE,parroquia.ESTADO ";
            $strFrom   = "FROM ADMI_PARROQUIA parroquia ";
            $strWhere  = "WHERE parroquia.ESTADO in (:ESTADO) ";
            $objQuery->setParameter("ESTADO", $strEstado);
            if(!empty($strCiudad))
            {
                $strFrom  .= " , ADMI_CIUDAD ciudad ";
                $strWhere .= " AND ciudad.ID_CIUDAD = parroquia.CIUDAD_ID AND ciudad.ID_CIUDAD = :ID_CIUDAD ";
                $objQuery->setParameter("ID_CIUDAD", $strCiudad);
            }
            if(!empty($intIdParroquia))
            {
                $strWhere .= " AND parroquia.ID_PARROQUIA = :ID_PARROQUIA ";
                $objQuery->setParameter("ID_PARROQUIA", $intIdParroquia);
            }
            $objRsmBuilder->addScalarResult('ID_PARROQUIA', 'ID_PARROQUIA', 'string');
            $objRsmBuilder->addScalarResult('CIUDAD_ID', 'CIUDAD_ID', 'string');
            $objRsmBuilder->addScalarResult('PARROQUIA_NOMBRE', 'PARROQUIA_NOMBRE', 'string');
            $objRsmBuilder->addScalarResult('ESTADO', 'ESTADO', 'string');

            $strSql  = $strSelect.$strFrom.$strWhere.$strOrder;
            $objQuery->setSQL($strSql);
            $arrayParroquia['Parroquia'] = $objQuery->getResult();
        }
        catch(\Exception $ex)
        {
            $strMensajeError = $ex->getMessage();
        }
        $arrayParroquia['error'] = $strMensajeError;
        return $arrayParroquia;
    }
}