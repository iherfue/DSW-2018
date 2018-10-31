<?php
class Coche
{
	private $pdo;

    public $auto_id;
    public $make;
    public $year;
    public $mileage;


	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Database::StartUp();
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Listar()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM autos");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($id)
	{
		try
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM autos WHERE auto_id = ?");


			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($id)
	{
		try
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM autos WHERE auto_id = ?");

			$stm->execute(array($id));
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{

		try
		{
			$sql = "UPDATE autos SET
						make = :make,
						year = :year,
            mileage = :mileage
						WHERE auto_id = :id";

			$this->pdo->prepare($sql)->execute(
				    array(
                    ':make' => htmlentities($data->make),
                    ':year' => htmlentities($data->year),
                    ':mileage' => htmlentities($data->mileage),
                    ':id' => htmlentities($data->auto_id)
					)
				);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Coche $data)
	{
		try
		{

		$sql = "INSERT INTO autos (make,year,mileage)
		        VALUES (:make, :year, :mileage)";

		$this->pdo->prepare($sql)->execute(
							array(
                  ':make' => htmlentities($data->make),
                  ':year' => htmlentities($data->year),
                  ':mileage' => htmlentities($data->mileage)
                )
			);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
}
