package com.project.baakapi.repository;

import com.project.baakapi.model.Pembelian;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

@Repository
public interface PembelianRepository extends JpaRepository<Pembelian, Long> {
    // Tambahan method khusus jika diperlukan
}
