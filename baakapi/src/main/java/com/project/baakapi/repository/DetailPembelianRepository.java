package com.project.baakapi.repository;

import com.project.baakapi.model.DetailPembelian;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

@Repository
public interface DetailPembelianRepository extends JpaRepository<DetailPembelian, Long> {
    // Tambahan method khusus jika diperlukan
}
