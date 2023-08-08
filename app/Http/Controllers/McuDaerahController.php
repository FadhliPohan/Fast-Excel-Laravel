<?php

namespace App\Http\Controllers;

use App\Models\McuDaerah;
use App\Models\McuDaerahMapping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Rap2hpoutre\FastExcel\FastExcel;

class McuDaerahController extends Controller
{
    public function index()
    {
        return view('daerah');
    }

    public function import(Request $request)
    {
        $rowNumber = 0;
        $maxRows = 5;

        $daerah = (new FastExcel())->withoutHeaders()->import($request->file('file'), function ($line) use (&$rowNumber, $maxRows) {

            if ($rowNumber >= 1 && $rowNumber <= $maxRows) {
                $dataMcuMapping = McuDaerahMapping::where('BADGE', 17)->first();
                $data = [];

                if ($dataMcuMapping) {
                    $dataColumn = Schema::getColumnListing('vendor_temp');

                    foreach ($dataColumn as $columnName) {
                        $nameRow = $dataMcuMapping->$columnName;
                        $data[$columnName] = $line[$nameRow];
               
                    }

                    if ($line[2]) {
                    return McuDaerah::create($data);
                    }
                }
            }

            $rowNumber++;
        });
    }
}

// 'BADGE' => $line['BADGE'],
                // 'NIK' => $line['NIK'],
                // 'BAGIAN' => $line['BAGIAN'],
                // 'KELUHAN' => $line['KELUHAN'],
                // 'RIWAYAT_PENYAKIT' => $line['RIWAYAT_PENYAKIT'],
                // 'PENYAKIT_KELUARGA' => $line['PENYAKIT_KELUARGA'],
                // 'KEHAMILAN' => $line['KEHAMILAN'],
                // 'KEBIASAAN' => $line['KEBIASAAN'],
                // 'OLAHRAGA' => $line['OLAHRAGA'],
                // 'ALERGI' => $line['ALERGI'],
                // 'TINGGI' => $line['TINGGI'],
                // 'BERAT' => $line['BERAT'],
                // 'TENSI' => $line['TENSI'],
                // 'NADI' => $line['NADI'],
                // 'PERNAPASAN' => $line['PERNAPASAN'],
                // 'SUHU' => $line['SUHU'],
                // 'KULIT_RAMBUT' => $line['KULIT_RAMBUT'],
                // 'REFRAKSI_MATA' => $line['REFRAKSI_MATA'],
                // 'VISUS_MATA' => $line['VISUS_MATA'],
                // 'PENYAKIT_MATA' => $line['PENYAKIT_MATA'],
                // 'CONJUNGTIVA' => $line['CONJUNGTIVA'],
                // 'SCLERA' => $line['SCLERA'],
                // 'KELAINAN_MATA_LAIN' => $line['KELAINAN_MATA_LAIN'],
                // 'TELINGA' => $line['TELINGA'],
                // 'MEMBRAN_TYMPANI' => $line['MEMBRAN_TYMPANI'],
                // 'REFLEK_CAHAYA' => $line['REFLEK_CAHAYA'],
                // 'SERUMEN_PLUG' => $line['SERUMEN_PLUG'],
                // 'HIDUNG' => $line['HIDUNG'],
                // 'SEPTUM_DEVIASI' => $line['SEPTUM_DEVIASI'],
                // 'CONCHA' => $line['CONCHA'],
                // 'POLYP' => $line['POLYP'],
                // 'KERONGKONGAN' => $line['KERONGKONGAN'],
                // 'TONSIL' => $line['TONSIL'],
                // 'FARING' => $line['FARING'],
                // 'AUDIOGRAM' => $line['AUDIOGRAM'],
                // 'HERNIA' => $line['HERNIA'],
                // 'HAEMORROID' => $line['HAEMORROID'],
                // 'SPINCER_ANI' => $line['SPINCER_ANI'],
                // 'EPIDIDYMIS_TESTIS_PROSTAT' => $line['EPIDIDYMIS_TESTIS_PROSTAT'],
                // 'VARICOCELE_HYDROCELE' => $line['VARICOCELE_HYDROCELE'],
                // 'FLOUR_ALBUS' => $line['FLOUR_ALBUS'],
                // 'PAPS_SMEAR' => $line['PAPS_SMEAR'],
                // 'LEHER' => $line['LEHER'],
                // 'JVP' => $line['JVP'],
                // 'STRUMA' => $line['STRUMA'],
                // 'GIGI' => $line['GIGI'],
                // 'MULUT' => $line['MULUT'],
                // 'GUSI' => $line['GUSI'],
                // 'BATAS_JANTUNG' => $line['BATAS_JANTUNG'],
                // 'IRAMA_JANTUNG' => $line['IRAMA_JANTUNG'],
                // 'SUARA_JANTUNG_MURMUR' => $line['SUARA_JANTUNG_MURMUR'],
                // 'ECG' => $line['ECG'],
                // 'TREADMILL_TEST' => $line['TREADMILL_TEST'],
                // 'PERKUSI' => $line['PERKUSI'],
                // 'AUSKULTASI' => $line['AUSKULTASI'],
                // 'THORAX_PHOTO' => $line['THORAX_PHOTO'],
                // 'AUTOSPIROMETRI' => $line['AUTOSPIROMETRI'],
                // 'TREMOR' => $line['TREMOR'],
                // 'SEMBAB' => $line['SEMBAB'],
                // 'PARALYSE' => $line['PARALYSE'],
                // 'PUPIL' => $line['PUPIL'],
                // 'PATELA' => $line['PATELA'],
                // 'ARCHILES' => $line['ARCHILES'],
                // 'DINDING_PERUT' => $line['DINDING_PERUT'],
                // 'PERUT' => $line['PERUT'],
                // 'HATI' => $line['HATI'],
                // 'LIMPA' => $line['LIMPA'],
                // 'GINJAL_ABDIMEN' => $line['GINJAL_ABDIMEN'],
                // 'USG_ABDOMEN' => $line['USG_ABDOMEN'],
                // 'GINJAL_TLG_BELAKANG' => $line['GINJAL_TLG_BELAKANG'],
                // 'HB' => $line['HB'],
                // 'LEUKOSIT' => $line['LEUKOSIT'],
                // 'LED' => $line['LED'],
                // 'EOSINOPIL' => $line['EOSINOPIL'],
                // 'BASOPIL' => $line['BASOPIL'],
                // 'STAF' => $line['STAF'],
                // 'SEGMENT' => $line['SEGMENT'],
                // 'LYMPOSIT' => $line['LYMPOSIT'],
                // 'MONOSIT' => $line['MONOSIT'],
                // 'ERITROSIT' => $line['ERITROSIT'],
                // 'TROMBOSIT' => $line['TROMBOSIT'],
                // 'HEMATOKRIT' => $line['HEMATOKRIT'],
                // 'MALARIA' => $line['MALARIA'],
                // 'PROTEIN_ALBUMIN' => $line['PROTEIN_ALBUMIN'],
                // 'REDUKSI' => $line['REDUKSI'],
                // 'UROBILINOGEN' => $line['UROBILINOGEN'],
                // 'BILIRUBIN' => $line['BILIRUBIN'],
                // 'ERITROSIT_RBC' => $line['ERITROSIT_RBC'],
                // 'LEKOSIT_WBC' => $line['LEKOSIT_WBC'],
                // 'SEL_EPITEL' => $line['SEL_EPITEL'],
                // 'ASAM_URAT_URIN' => $line['ASAM_URAT_URIN'],
                // 'AMORF' => $line['AMORF'],
                // 'TRIPLE_PHOSP' => $line['TRIPLE_PHOSP'],
                // 'CA_OX' => $line['CA_OX'],
                // 'GRANULER' => $line['GRANULER'],
                // 'HYALINE' => $line['HYALINE'],
                // 'BAKTERI' => $line['BAKTERI'],
                // 'URIN_LAIN2' => $line['URIN_LAIN2'],
                // 'BILIRUBIN_TOTAL' => $line['BILIRUBIN_TOTAL'],
                // 'BILIRUBIN_DIRECT' => $line['BILIRUBIN_DIRECT'],
                // 'BILIRUBIN_INDIRECT' => $line['BILIRUBIN_INDIRECT'],
                // 'ALKALINE_PHOSPAT' => $line['ALKALINE_PHOSPAT'],
                // 'SGPT' => $line['SGPT'],
                // 'SGOT' => $line['SGOT'],
                // 'GAMMA_GT' => $line['GAMMA_GT'],
                // 'PROTEIN_TOTAL' => $line['PROTEIN_TOTAL'],
                // 'ALBUMIN' => $line['ALBUMIN'],
                // 'GLOBULIN' => $line['GLOBULIN'],
                // 'KOLEST_TOTAL' => $line['KOLEST_TOTAL'],
                // 'TRIGLISERIDA' => $line['TRIGLISERIDA'],
                // 'HDL_KOLEST' => $line['HDL_KOLEST'],
                // 'LDL_KOLEST' => $line['LDL_KOLEST'],
                // 'UREUM' => $line['UREUM'],
                // 'KREATININ' => $line['KREATININ'],
                // 'ASAM_URAT_GINJAL' => $line['ASAM_URAT_GINJAL'],
                // 'GULA_DARAH_PUASA' => $line['GULA_DARAH_PUASA'],
                // 'GULA_DARAH_2JAMPP' => $line['GULA_DARAH_2JAMPP'],
                // 'URINE_REDUKSI_PUASA' => $line['URINE_REDUKSI_PUASA'],
                // 'URINE_REDUKSI_2JAMPP' => $line['URINE_REDUKSI_2JAMPP'],
                // 'HBS_AG' => $line['HBS_AG'],
                // 'ANTI_HBS' => $line['ANTI_HBS'],
                // 'ASTO' => $line['ASTO'],
                // 'REMATOID_FAKTOR' => $line['REMATOID_FAKTOR'],
                // 'CRP' => $line['CRP'],
                // 'KESIMPULAN' => $line['KESIMPULAN'],
                // 'SARAN' => $line['SARAN'],
                // 'DOKTER' => $line['DOKTER'],
                // 'PERIODE' => $line['PERIODE'],
                // 'STATUS' => $line['STATUS'],
                // 'KESIMPULAN_DR' => $line['KESIMPULAN_DR'],
                // 'SARAN_DR' => $line['SARAN_DR'],
                // 'S_JENIS_KELAMIN' => $line['S_JENIS_KELAMIN'],
                // 'S_UMUR' => $line['S_UMUR'],
                // 'S_TEKANAN_DARAH' => $line['S_TEKANAN_DARAH'],
                // 'S_IMT' => $line['S_IMT'],
                // 'S_MEROKOK' => $line['S_MEROKOK'],
                // 'S_DIABETES' => $line['S_DIABETES'],
                // 'S_AKTIVITAS' => $line['S_AKTIVITAS'],
                // 'TAHUN_CEK' => $line['TAHUN_CEK'],
                // 'APPROVE_DATE' => $line['APPROVE_DATE'],
                // 'APPROVE_IP' => $line['APPROVE_IP'],
                // 'HASIL_PEMKES' => $line['HASIL_PEMKES'],
