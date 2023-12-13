package com.project.baakapi.repository;

import com.project.baakapi.model.IzinMahasiswa;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

@Repository
public interface IzinMahasiswaRepository extends JpaRepository<IzinMahasiswa, Long> {
    // Tambahan method khusus jika diperlukan
}

