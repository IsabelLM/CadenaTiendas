<?php
class Articulo
{ private $id;
  private $nombreCorto;
  private $nombre;
  private $descripcion;
  private $pvp;
  private $idFamilia;
  private $foto;

  public function __contrunct()
  {}

  public function setNombreCorto($aNombreCorto)
  { $this->nombreCorto = $aNombreCorto;
  }

  public function setNombre($aNombre)
  { $this->nombre = $aNombre;
  }

  public function setDescripcion($aDescripcion)
  { $this->descripcion = $aDescripcion;
  }

  public function setPvp($aPvp)
  { $this->pvp = $aPvp;
  }

  public function setIdFamilia($aIdFamilia)
  { $this->idFamilia = $aIdFamilia;
  }

  public function setFoto($Foto)
  { $this->foto = $Foto;
  }

  public function getId()
  { return $this->id;
  }

  public function getNombreCorto()
  { return $this->nombreCorto;
  }

  public function getNombre()
  { return $this->nombre;
  }

  public function getDescripcion()
  { return $this->descripcion;
  }

}
