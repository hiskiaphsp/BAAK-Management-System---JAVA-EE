package com.project.baakapi.repository;

import com.project.baakapi.model.BookingRuangan;
import org.springframework.data.jpa.repository.JpaRepository;

public interface BookingRuanganRepository extends JpaRepository<BookingRuangan, Long> {
    // Jika Anda membutuhkan method kustom, tambahkan di sini
}
