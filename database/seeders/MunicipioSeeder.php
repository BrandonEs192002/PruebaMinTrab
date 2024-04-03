<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Municipio;
use App\Models\Departamento;

class MunicipioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $municipios = [
            'Guatemala' => [
                'Guatemala', 'Santa Catarina Pinula', 'San José Pinula', 'San José del Golfo', 'Palencia',
                'Chinautla', 'San Pedro Ayampuc', 'Mixco', 'San Pedro Sacatepéquez', 'San Juan Sacatepéquez',
                'San Raymundo', 'Chuarrancho', 'Fraijanes', 'Amatitlán', 'Villa Nueva', 'Villa Canales', 'Petapa'
            ],
            'El Progreso' => [
                'El Jícaro', 'Guastatoya', 'Morazán', 'San Agustín Acasaguastlán', 'San Antonio La Paz',
                'San Cristóbal Acasaguastlán', 'Sanarate', 'Sansare'
            ],
            'Sacatepéquez' => [
                'Antigua Guatemala', 'Ciudad Vieja', 'Jocotenango', 'Magdalena Milpas Altas', 'Pastores',
                'San Antonio Aguas Calientes', 'San Bartolomé Milpas Altas', 'San Lucas Sacatepéquez', 'San Miguel Dueñas',
                'Santa Catarina Barahona', 'Santa Lucía Milpas Altas', 'Santa María de Jesús', 'Santiago Sacatepéquez', 'Santo Domingo Xenacoj',
                'Sumpango'
            ],
            'Chimaltenango' => [
                'Chimaltenango', 'San José Poaquil', 'San Martín Jilotepeque', 'San Juan Comalapa', 'Santa Apolonia',
                'Tecpán Guatemala', 'Patzún', 'Pochuta', 'Patzicía', 'Santa Cruz Balanyá', 'Acatenango', 'San Pedro Yepocapa',
                'San Andrés Itzapa', 'Parramos', 'Zaragoza', 'El Tejar'
            ],
            'Escuintla' => [
                'Escuintla', 'Santa Lucía Cotzumalguapa', 'La Democracia', 'Siquinalá', 'Masagua', 'Tiquisate',
                'La Gomera', 'Guanagazapa', 'San José', 'Iztapa', 'Palín', 'San Vicente Pacaya', 'Nueva Concepción'
            ],
            'Santa Rosa' => [
                'Cuilapa', 'Barberena', 'Santa Rosa de Lima', 'Casillas', 'San Rafael Las Flores', 'Oratorio', 'San Juan Tecuaco',
                'Chiquimulilla', 'Taxisco', 'Santa María Ixhuatán', 'Guazacapán', 'Santa Cruz Naranjo', 'Pueblo Nuevo Viñas',
                'Nueva Santa Rosa', 'Gobernador Gálvez', 'Santa Rosa de Lima'
            ],
            'Sololá' => [
                'Sololá', 'San José Chacayá', 'Santa María Visitación', 'Santa Lucía Utatlán', 'Nahualá', 'Santa Catarina Ixtahuacán',
                'Santa Clara La Laguna', 'Concepción', 'San Andrés Semetabaj', 'Panajachel', 'Santa Catarina Palopó',
                'San Antonio Palopó', 'San Lucas Tolimán', 'Santa Cruz La Laguna', 'San Pablo La Laguna', 'San Marcos La Laguna',
                'San Juan La Laguna', 'San Pedro La Laguna', 'Santiago Atitlán'
            ],
            'Totonicapán' => [
                'Totonicapán', 'San Cristóbal Totonicapán', 'San Francisco El Alto', 'San Andrés Xecul', 'Momostenango', 'Santa María Chiquimula'
            ],
            'Quetzaltenango' => [
                'Quetzaltenango', 'Salcajá', 'Olintepeque', 'San Carlos Sija', 'Sibilia', 'Cabricán', 'Cajolá', 'San Miguel Sigüilá',
                'San Juan Ostuncalco', 'San Mateo', 'Concepción Chiquirichapa', 'San Martín Sacatepéquez', 'Almolonga', 'Cantel',
                'Huitán', 'Zunil', 'Colomba', 'San Francisco La Unión', 'El Palmar', 'Coatepeque', 'Génova', 'Flores Costa Cuca',
                'La Esperanza', 'Palestina de Los Altos', 'San Carlos Sija'
            ],
            'Suchitepéquez' => [
                'Mazatenango', 'Cuyotenango', 'San Francisco Zapotitlán', 'San Bernardino', 'San José El Idolo', 'Santo Domingo Suchitepéquez',
                'San Lorenzo', 'Samayac', 'San Pablo Jocopilas', 'San Antonio Suchitepéquez', 'San Miguel Panán', 'San Gabriel', 'Chicacao',
                'Patulul', 'Santa Bárbara', 'San Juan Bautista', 'Santo Tomás La Unión', 'Zunilito', 'Pueblo Nuevo', 'Río Bravo'
            ],
            'Retalhuleu' => [
                'Retalhuleu', 'San Sebastián', 'Santa Cruz Muluá', 'San Martín Zapotitlán', 'San Felipe', 'San Andrés Villa Seca',
                'Champerico', 'Nuevo San Carlos', 'El Asintal', 'San Felipe Retalhuleu'
            ],
            'San Marcos' => [
                'San Marcos', 'San Pedro Sacatepéquez', 'San Antonio Sacatepéquez', 'Comitancillo', 'San Miguel Ixtahuacán',
                'Concepción Tutuapa', 'Tacaná', 'Sibinal', 'Tajumulco', 'Tejutla', 'San Rafael Pie de la Cuesta', 'Nuevo Progreso',
                'El Tumbador', 'San José El Rodeo', 'Malacatán', 'Catarina', 'Ayutla', 'Ocós', 'San Pablo', 'El Quetzal',
                'La Reforma', 'Pajapita', 'Ixchiguán', 'San José Ojetenam', 'San Cristóbal Cucho', 'Sipacapa', 'Esquipulas Palo Gordo',
                'Río Blanco', 'San Lorenzo'
            ],
            'Huehuetenango' => [
                'Huehuetenango', 'Chiantla', 'Malacatancito', 'Cuilco', 'Nenton', 'San Pedro Necta', 'Jacaltenango', 'San Pedro Soloma',
                'San Ildefonso Ixtahuacán', 'Santa Bárbara', 'La Libertad', 'La Democracia', 'San Miguel Acatán', 'San Rafael La Independencia',
                'San Juan Atitán', 'Santa Eulalia', 'San Mateo Ixtatán', 'Colotenango', 'San Sebastián Huehuetenango', 'Tectitán',
                'Concepción Huista', 'San Juan Ixcoy', 'San Antonio Huista', 'San Sebastián Coatán', 'Barillas', 'Aguacatán',
                'San Rafael Petzal', 'San Gaspar Ixchil', 'Santiago Chimaltenango', 'Santa Ana Huista', 'Union Cantinil'
            ],
            'Quiché' => [
                'Santa Cruz del Quiché', 'Chiché', 'Chinique', 'Zacualpa', 'Chiche', 'Patzité', 'San Antonio Ilotenango', 'San Pedro Jocopilas',
                'Cunén', 'San Juan Cotzal', 'Joyabaj', 'Nebaj', 'San Pedro Sacatepéquez', 'San Andrés Sajcabajá', 'San Miguel Uspantán',
                'Santo Tomás Chichicastenango', 'Chicamán', 'Pachalum'
            ],
            'Baja Verapaz' => [
                'Salamá', 'San Miguel Chicaj', 'Rabinal', 'Cubulco', 'Granados', 'Santa Cruz El Chol', 'San Jerónimo'
            ],
            'Alta Verapaz' => [
                'Cobán', 'Santa Cruz Verapaz', 'San Cristóbal Verapaz', 'Tactic', 'Tamahú', 'Tucurú', 'Panzós', 'Senahú',
                'San Pedro Carchá', 'San Juan Chamelco', 'Lanquín', 'Santa María Cahabón', 'Chisec', 'Chahal', 'Fray Bartolomé de las Casas',
                'La Tinta', 'Raxruhá', 'Santa Catalina La Tinta'
            ],
            'Petén' => [
                'Flores', 'San José', 'San Benito', 'San Andrés', 'La Libertad', 'San Francisco', 'Santa Ana', 'Dolores', 'San Luis', 'Sayaxché',
                'Melchor de Mencos', 'Poptún', 'Las Cruces', 'San José', 'El Chal', 'Purulhá'
            ],
            'Izabal' => [
                'Puerto Barrios', 'Livingston', 'El Estor', 'Morales', 'Los Amates'
            ],
            'Zacapa' => [
                'Zacapa', 'Estanzuela', 'Río Hondo', 'Gualán', 'Teculután', 'Usumatlán', 'Cabañas', 'San Diego'
            ],
            'Chiquimula' => [
                'Chiquimula', 'San José La Arada', 'San Juan Ermita', 'Jocotán', 'Camotán', 'Olopa', 'Esquipulas', 'Concepción Las Minas',
                'Quezaltepeque', 'San Jacinto', 'Ipala'
            ],
            'Jalapa' => [
                'Jalapa', 'San Pedro Pinula', 'San Luis Jilotepeque', 'San Manuel Chaparrón', 'San Carlos Alzatate', 'Monjas', 'Mataquescuintla'
            ],
            'Jutiapa' => [
                'Jutiapa', 'El Progreso', 'Santa Catarina Mita', 'Agua Blanca', 'Asunción Mita', 'Yupiltepeque', 'Atescatempa', 'Jerez',
                'El Adelanto', 'Zapotitlán', 'Comapa', 'Jalpatagua', 'Conguaco', 'Moyuta', 'Pasaco', 'San José Acatempa', 'Quesada', 'La Unión'
            ]
        ];

        foreach ($municipios as $departamento => $lista_municipios) {
            // Buscar el ID del departamento actual
            $departamento_id = Departamento::where('nombre', $departamento)->value('id');

            if ($departamento_id) {
                foreach ($lista_municipios as $municipio) {
                    Municipio::create([
                        'nombre' => $municipio,
                        'departamento_id' => $departamento_id
                    ]);
                }
            } else {
                // Manejar el caso en que el departamento no se encuentre
                echo "Departamento '$departamento' no encontrado.\n";
            }
        }
    }
}
