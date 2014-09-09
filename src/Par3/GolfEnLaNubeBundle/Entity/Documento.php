<?php
namespace Par3\GolfEnLaNubeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * @ORM\Table(name="documento")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Documento
{
	/**
	 * @ORM\Id
	 * @ORM\Column(name="id", type="integer", nullable=false)
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	public $id;
	/**
	 * @ORM\Column(type="string", length=255)
	 * @Assert\NotBlank()
	 */
	
	public $name;

	/**
	* @ORM\Column(type="string", length=255, nullable=true)
	*/

	public $path;

	/**
	 * @ORM\Column(name="id_usuario_uploader", type="integer",nullable=true)
	 */
	
	public $id_usuario_uploader;

	/**
	 * @ORM\Column(name="uploaded_date", type="datetime",nullable=true)
	 */
	
	public $uploaded_date;
	
	/**
	 * @Assert\File(maxSize="20000000")
	 */
	private $file;

	private $temp;
	
	/**
	 * Sets file.
	 *
	 * @param UploadedFile $file
	 */
	public function setFile(UploadedFile $file = null)
	{
		$this->file = $file;
		// check if we have an old image path
		if (isset($this->path)) {
			// store the old name to delete after the update
			$this->temp = $this->path;
			$this->path = null;
		} else {
			$this->path = 'initial';
		}
	}
	
	/**
	 * Get file.
	 *
	 * @return UploadedFile
	 */
	public function getFile()
	{
		return $this->file;
	}

	public function getAbsolutePath()
	{
		return null === $this->path
		? null
		: $this->getUploadRootDir().'/'.$this->path;
	}

	public function getWebPath()
	{
		return null === $this->path
		? null
		: $this->getUploadDir().'/'.$this->path;
	}

	protected function getUploadRootDir()
	{
	// the absolute directory path where uploaded
	// documents should be saved
		return __DIR__.'/../../../../web/'.$this->getUploadDir();
	}

	protected function getUploadDir()
	{
	// get rid of the __DIR__ so it doesn't screw up
	// when displaying uploaded doc/image in the view.
		return 'uploads/documentos';
	}

	/**
	 * @ORM\PrePersist()
	 * @ORM\PreUpdate()
	 */
	public function preUpload()
	{
		if (null !== $this->getFile()) {
			// do whatever you want to generate a unique name
			$filename = sha1(uniqid(mt_rand(), true));
			$this->path = $filename.'.'.$this->getFile()->guessExtension();
		}
	}

	/**
	 * @ORM\PostPersist()
	 * @ORM\PostUpdate()
	 */
	public function upload()
	{
		if (null === $this->getFile()) {
			return;
		}
		// if there is an error when moving the file, an exception will
		// be automatically thrown by move(). This will properly prevent
		// the entity from being persisted to the database on error
		$this->getFile()->move($this->getUploadRootDir(), $this->path);
		// check if we have an old image
		if (isset($this->temp)) {
			// delete the old image
			unlink($this->getUploadRootDir().'/'.$this->temp);
			// clear the temp image path
			$this->temp = null;
		}
		$this->file = null;
	}
	/**
	 * @ORM\PostRemove()
	 */
	public function removeUpload()
	{
		if ($file = $this->getAbsolutePath()) {
			unlink($file);
		}
	}

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Documento
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set path
     *
     * @param string $path
     * @return Documento
     */
    public function setPath($path)
    {
        $this->path = $path;
    
        return $this;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set id_usuario_uploader
     *
     * @param integer $idUsuarioUploader
     * @return Documento
     */
    public function setIdUsuarioUploader($idUsuarioUploader)
    {
        $this->id_usuario_uploader = $idUsuarioUploader;
    
        return $this;
    }

    /**
     * Get id_usuario_uploader
     *
     * @return integer 
     */
    public function getIdUsuarioUploader()
    {
        return $this->id_usuario_uploader;
    }

    /**
     * Set uploaded_date
     *
     * @param \DateTime $uploadedDate
     * @return Documento
     */
    public function setUploadedDate($uploadedDate)
    {
        $this->uploaded_date = $uploadedDate;
    
        return $this;
    }

    /**
     * Get uploaded_date
     *
     * @return \DateTime 
     */
    public function getUploadedDate()
    {
        return $this->uploaded_date;
    }
}