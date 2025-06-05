document.addEventListener('DOMContentLoaded', function() {
    const sidebarToggle = document.querySelector('.sidebar-toggle');
    const layoutToggle = document.querySelector('.layout-toggle');
    const sidebar = document.querySelector('aside');
    const navbar = document.querySelector('nav');
    
    // Fungsi untuk menyesuaikan sidebar berdasarkan ukuran layar
    function adjustSidebar() {
        // Tambahkan transition duration untuk sidebar
        sidebar.style.transition = 'width 300ms ease-in-out, transform 300ms ease-in-out';
        if (window.innerWidth >= 640) {
            // Untuk layar besar
            sidebar.classList.remove('-translate-x-full');
            
            // Pastikan sidebar dalam mode collapse saat pertama kali dimuat
            sidebar.classList.add('w-[70px]');
            sidebar.classList.remove('w-[200px]');
            
            // Sembunyikan teks saat pertama kali dimuat
            const menuTexts = document.querySelectorAll('aside span');
            menuTexts.forEach(text => {
                text.style.opacity = '0';
                text.classList.add('hidden');
            });
        } else {
            // Untuk layar kecil
            sidebar.classList.add('w-[70px]');
            sidebar.classList.remove('w-[200px]');
            sidebar.classList.remove('-translate-x-full'); // Tampilkan sidebar pada layar kecil
            
            // Pastikan teks tersembunyi pada layar kecil
            const menuTexts = document.querySelectorAll('aside span');
            menuTexts.forEach(text => {
                text.style.opacity = '0';
                text.classList.add('hidden');
            });
            
            // Sesuaikan posisi sidebar pada layar kecil
            sidebar.style.left = '0';
            sidebar.style.top = '0';
            sidebar.style.height = '100vh';
            sidebar.style.borderRadius = '0';
        }
    }
    
    // Jalankan fungsi saat halaman dimuat
    adjustSidebar();
    
    // Jalankan fungsi saat ukuran layar berubah
    window.addEventListener('resize', adjustSidebar);
    
    // Hamburger button toggle
    sidebarToggle.addEventListener('click', () => {
        if (window.innerWidth >= 640) {
            sidebar.classList.toggle('-translate-x-full');
        } else {
            // Untuk layar kecil, gunakan pendekatan berbeda
            if (sidebar.classList.contains('-translate-x-full')) {
                sidebar.classList.remove('-translate-x-full');
            } else {
                sidebar.classList.add('-translate-x-full');
            }
        }
    });

    // Layout sidebar button toggle
    layoutToggle.addEventListener('click', () => {
        sidebar.classList.toggle('w-[70px]');
        sidebar.classList.toggle('w-[175px]');
        
        // Toggle text visibility
        const menuTexts = document.querySelectorAll('aside span');
        menuTexts.forEach(text => {
            if(sidebar.classList.contains('w-[70px]')) {
                text.style.opacity = '0';
                setTimeout(() => {
                    text.classList.add('hidden');
                }, 300);
            } else {
                text.classList.remove('hidden');
                setTimeout(() => {
                    text.style.opacity = '1';
                }, 50);
            }
        });

        // Adjust navbar position
        if (window.innerWidth >= 640) {
            // Tambahkan transition untuk navbar
            navbar.style.transition = 'left 300ms ease-in-out';
            if (sidebar.classList.contains('w-[70px]')) { 
                navbar.classList.remove('sm:left-[210px]');
                navbar.classList.add('sm:left-[100px]');
            } else {
                navbar.classList.remove('sm:left-[100px]');
                navbar.classList.add('sm:left-[210px]'); // Sesuaikan dengan nilai main content
            }
        }
        
        // Adjust main content position
        const mainContent = document.querySelector('main');
        
        // Tambahkan transition sebelum mengubah kelas
        mainContent.style.transition = 'margin-left 300ms ease-in-out';
        if (sidebar.classList.contains('w-[70px]')) { 
            mainContent.classList.remove('sm:ml-[200px]'); 
            mainContent.classList.add('sm:ml-[90px]'); 
        } else { 
            mainContent.classList.remove('sm:ml-[90px]'); 
            mainContent.classList.add('sm:ml-[200px]'); // Ubah dari sm:ml-[250px] menjadi nilai yang lebih kecil
        } 
        
        // Adjust card width
        const cards = document.querySelectorAll('.bg-[#12131A]');
        cards.forEach(card => {
            card.style.transition = 'all 300ms ease-in-out';
            if (sidebar.classList.contains('w-[70px]')) {
                card.style.marginLeft = '0';
                card.style.width = 'calc(100% - 1rem)';
            } else {
                card.style.marginLeft = '1rem';
                card.style.width = 'calc(100% - 2rem)';
            }
        });
    });
});