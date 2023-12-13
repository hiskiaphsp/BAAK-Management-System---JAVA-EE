package com.project.baakapi.service;

import com.project.baakapi.model.Product;
import com.project.baakapi.repository.ProductRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.Date;
import java.util.List;
import java.util.Optional;

@Service
public class ProductService {

    private final ProductRepository productRepository;

    @Autowired
    public ProductService(ProductRepository productRepository) {
        this.productRepository = productRepository;
    }

    public List<Product> getAllProducts() {
        return productRepository.findAll();
    }

    public Optional<Product> getProductById(Long id) {
        return productRepository.findById(id);
    }

    public Product createProduct(Product product) {
        product.setCreatedAt(new Date());
        product.setUpdatedAt(new Date());
        return productRepository.save(product);
    }

    public Product updateProduct(Long id, Product updatedProduct) {
        return productRepository.findById(id)
                .map(existingProduct -> {
                    existingProduct.setNamaProduct(updatedProduct.getNamaProduct());
                    existingProduct.setUkuran(updatedProduct.getUkuran());
                    existingProduct.setHarga(updatedProduct.getHarga());
                    existingProduct.setStock(updatedProduct.getStock()); // Tambahkan baris ini
                    existingProduct.setUpdatedAt(new Date());
                    return productRepository.save(existingProduct);
                })
                .orElse(null);
    }

    public boolean deleteProduct(Long id) {
        if (productRepository.existsById(id)) {
            productRepository.deleteById(id);
            return true;
        }
        return false;
    }
}