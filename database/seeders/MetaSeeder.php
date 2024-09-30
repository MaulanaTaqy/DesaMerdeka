<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MetaBlogCategory;
use App\Models\MetaEventCategory;
use App\Models\MetaMemberCategory;
use Illuminate\Support\Facades\DB;
use App\Models\MetaProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MetaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            DB::beginTransaction();

            // $eventCat = ['Update Tech', 'Startup', 'Talkshow', 'Workshop', 'coaching', 'Funding', 'Kompetisi'];
            $eventCat = ['Kompetisi', 'Workshop', 'Seminar', 'Pameran', 'Bazar', 'Festival', 'Pelayanan Masyarakat', 'Sosialisasi', 'Pelatihan', 'Edukasi', 'Seni dan Budaya', 'Perayaan', 'Kegiatan Sosial', 'Pertanian/Perikanan'];

            foreach ($eventCat as $data) {
                MetaEventCategory::updateOrCreate([
                    'name'          => $data,
                    'is_approved'   => 1
                ]);
            }

            // $productCat = ['Games', 'Video Editing', 'Image Editing', 'Animation'];
            $productCat = ['Pertanian', 'Perikanan', 'Peternakan','Makanan', 'Minuman', 'Kerajinan', 'Tekstil', 'Teknologi', 'Agroindustri'];

            foreach ($productCat as $data) {
                MetaProductCategory::updateOrCreate([
                    'name'          => $data,
                    'is_approved'   => 1
                ]);
            }

            // $blogCat = ['Teknologi', 'E-Commerce', 'Investasi', 'Akuntansi'];
            $blogCat = ['Teknologi', 'Pertanian', 'Perikanan', 'Peternakan','Kuliner', 'Seni dan Budaya', 'Pariwisata', 'Kegiatan Sosial', 'Kesehatan', 'Keuangan', 'Inovasi', 'Kewirausahaan'];

            foreach ($blogCat as $data) {
                MetaBlogCategory::updateOrCreate([
                    'name'          => $data,
                    'is_approved'   => 1
                ]);
            }

            // $memberCat = [
            //     'Software',
            //     'Aplikasi Mobile',
            //     'Aplikasi Dekstop',
            //     'Aplikasi Website',
            //     'Bigdata',
            //     'Cloud Computing',
            //     'Article Intelligent',
            //     'Speech Recog',
            //     'Video Multimedia',
            //     'Embeded System',
            //     'Internet of Things',
            //     'Robotik',
            //     'Elektronika',
            //     'Micro Controller',
            //     'Chipset',
            //     'Network / Jaringan',
            //     'Telekomunikasi',
            //     'Hardware',
            //     'Animasi 2D',
            //     'Animasi 3D',
            //     'Game 2D/3D',
            //     'Motion Graphic',
            //     'Desain Grafis',
            //     'Desain Web',
            //     'Desain Produk',
            //     'Komik',
            //     'Film & Advertising',
            //     'Digital Marketing',
            //     'Ecommerce',
            //     'Transportasi',
            //     'Edukasi',
            //     'Kesehatan',
            //     'Pertanian',
            //     'Fintech',
            //     'Fintech',
            //     'Blockchain',
            //     'Inkubator bisnis',
            //     'Coaching',
            //     'CoWorking Spase',
            //     'Virtual Office',
            //     'Training',
            //     'Sertifikasi',
            //     'Konsultan IT',
            //     'Event Organizer',
            //     'Industri Pabrik',
            // ];
            $memberCat = [
                'Teknologi',
                'Video Multimedia',
                'Internet of Things',
                'Robotik',
                'Elektronika',
                'Network / Jaringan',
                'Telekomunikasi',
                'Desain Grafis',
                'Desain Produk',
                'Transportasi',
                'Edukasi',
                'Kesehatan',
                'Pertanian',
                'Perikanan',
                'Peternakan',
                'Pariwisata',
                'Pendidikan',
                'Kerajinan',
                'Agroindustri',
                'Industri Makanan',
                'Industri Minuman',
                'Kebugaran dan Kesehatan',
                'Pelatihan',
                'Event Organizer',
                'Industri Pabrik',
            ];

            foreach ($memberCat as $data) {
                MetaMemberCategory::updateOrCreate([
                    'name'          => $data,
                    'is_approved'   => 1
                ]);
            }
            

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            echo $e->getMessage();
        }
    }
}
