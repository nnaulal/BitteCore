<?php

namespace App\Repository;
use Doctrine\ORM\Query\ResultSetMappingBuilder;
/**
 * AdmiProvinciaRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class AdmiProvinciaRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * Documentación para la función 'getProvincia'.
     *
     * Método encargado de retornar todos las provincias según los parametros enviados.
     * 
     * @author Kevin Baque
     * @version 1.0 16-07-2019
     * 
     * @return array  $arrayProvincia
     * 
     */
    public function getProvincia($arrayParametros)
    {
        $strEstado       = $arrayParametros['estado'] ? $arrayParametros['estado']:'';
        $intIdPais       = $arrayParametros['idPais'] ? $arrayParametros['idPais']:'';
        $strRegion       = $arrayParametros['region'] ? $arrayParametros['region']:'';
        $arrayProvincia  = array();
        $objRsmBuilder   = new ResultSetMappingBuilder($this->_em);
        $objQuery        = $this->_em->createNativeQuery(null, $objRsmBuilder);
        $strMensajeError = '';
        $strSelect       = '';
        $strFrom         = '';
        $strWhere        = '';
        $strOrder        = 'ORDER BY provincia.PROVINCIA_NOMBRE ASC';
        try
        {
            $strSelect = "SELECT pais.PAIS_NOMBRE,pais.ID_PAIS,provincia.ID_PROVINCIA,provincia.PAIS_ID,
                            provincia.PROVINCIA_NOMBRE,provincia.REGION_NOMBRE,provincia.ESTADO ";
            $strFrom   = "FROM ADMI_PROVINCIA provincia, ADMI_PAIS pais ";
            $strWhere  = "WHERE pais.ID_PAIS=provincia.PAIS_ID AND provincia.PAIS_ID=:idPais ";
            $objQuery->setParameter("idPais", $intIdPais);

            if(!empty($strEstado))
            {
                $strWhere  .= "AND lower(provincia.ESTADO)=lower(:ESTADO) ";
                $objQuery->setParameter("ESTADO", $strEstado);
            }
            if(!empty($strRegion))
            {
                $strWhere  .= "AND lower(provincia.REGION_NOMBRE)=lower(:region) ";
                $objQuery->setParameter("region", $strRegion);
            }
            $objRsmBuilder->addScalarResult('ID_PROVINCIA', 'ID_PROVINCIA', 'string');
            $objRsmBuilder->addScalarResult('PROVINCIA_NOMBRE', 'PROVINCIA_NOMBRE', 'string');
            $objRsmBuilder->addScalarResult('REGION_NOMBRE', 'REGION_NOMBRE', 'string');
            $objRsmBuilder->addScalarResult('ID_PAIS', 'ID_PAIS', 'string');
            $objRsmBuilder->addScalarResult('PAIS_NOMBRE', 'PAIS_NOMBRE', 'string');
            $objRsmBuilder->addScalarResult('ESTADO', 'ESTADO', 'string');

            $strSql  = $strSelect.$strFrom.$strWhere.$strOrder;
            $objQuery->setSQL($strSql);
            $arrayProvincia['provincia'] = $objQuery->getResult();
        }
        catch(\Exception $ex)
        {
            $strMensajeError = $ex->getMessage();
        }
        $arrayProvincia['error'] = $strMensajeError;
        return $arrayProvincia;
    }
}
