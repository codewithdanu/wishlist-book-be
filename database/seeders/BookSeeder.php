<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genreNames = [
            'Fiction', 'Non-Fiction', 'Science', 'Fantasy', 'Romance',
            'Mystery', 'History', 'Horror', 'Adventure', 'Biography'
        ];

        $books = [
            ['To Kill a Mockingbird', ['Harper Lee'],                ['Fiction', 'History'], 1960, ['English']],
            ['1984', ['George Orwell'],                              ['Fiction', 'Science'], 1949, ['English']],
            ['Pride and Prejudice', ['Jane Austen'],                 ['Fiction', 'Romance'], 1813, ['English']],
            ['The Great Gatsby', ['F. Scott Fitzgerald'],            ['Fiction'], 1925, ['English']],
            ['Moby-Dick', ['Herman Melville'],                       ['Fiction', 'Adventure'], 1851, ['English']],
            ['War and Peace', ['Leo Tolstoy'],                       ['Fiction', 'History'], 1869, ['English']],
            ['Crime and Punishment', ['Fyodor Dostoevsky'],          ['Fiction', 'Mystery'], 1866, ['English']],
            ['The Catcher in the Rye', ['J.D. Salinger'],            ['Fiction'], 1951, ['English']],
            ['The Hobbit', ['J.R.R. Tolkien'],                       ['Fantasy', 'Adventure'], 1937, ['English']],
            ['The Lord of the Rings', ['J.R.R. Tolkien'],            ['Fantasy', 'Adventure'], 1954, ['English']],
            ['Harry Potter and the Sorcerer\'s Stone', ['J.K. Rowling'], ['Fantasy', 'Adventure'], 1997, ['English']],
            ['Harry Potter and the Chamber of Secrets', ['J.K. Rowling'], ['Fantasy', 'Adventure'], 1998, ['English']],
            ['Harry Potter and the Prisoner of Azkaban', ['J.K. Rowling'], ['Fantasy', 'Adventure'], 1999, ['English']],
            ['The Lion, the Witch and the Wardrobe', ['C.S. Lewis'], ['Fantasy', 'Adventure'], 1950, ['English']],
            ['The Alchemist', ['Paulo Coelho'],                      ['Fiction'], 1988, ['English']],
            ['The Little Prince', ['Antoine de Saint-Exupéry'],      ['Fiction', 'Fantasy'], 1943, ['English']],
            ['Brave New World', ['Aldous Huxley'],                   ['Fiction', 'Science'], 1932, ['English']],
            ['The Picture of Dorian Gray', ['Oscar Wilde'],          ['Fiction', 'Horror'], 1890, ['English']],
            ['The Kite Runner', ['Khaled Hosseini'],                 ['Fiction'], 2003, ['English']],
            ['A Thousand Splendid Suns', ['Khaled Hosseini'],        ['Fiction'], 2007, ['English']],
            ['The Da Vinci Code', ['Dan Brown'],                     ['Mystery', 'Fiction'], 2003, ['English']],
            ['Angels & Demons', ['Dan Brown'],                       ['Mystery', 'Fiction'], 2000, ['English']],
            ['The Girl with the Dragon Tattoo', ['Stieg Larsson'],   ['Mystery'], 2005, ['English']],
            ['The Hunger Games', ['Suzanne Collins'],                ['Fiction', 'Adventure'], 2008, ['English']],
            ['Catching Fire', ['Suzanne Collins'],                   ['Fiction', 'Adventure'], 2009, ['English']],
            ['Mockingjay', ['Suzanne Collins'],                      ['Fiction', 'Adventure'], 2010, ['English']],
            ['The Fault in Our Stars', ['John Green'],               ['Fiction', 'Romance'], 2012, ['English']],
            ['The Handmaid\'s Tale', ['Margaret Atwood'],            ['Fiction'], 1985, ['English']],
            ['The Road', ['Cormac McCarthy'],                        ['Fiction'], 2006, ['English']],
            ['The Shining', ['Stephen King'],                        ['Horror', 'Fiction'], 1977, ['English']],
            ['It', ['Stephen King'],                                 ['Horror', 'Fiction'], 1986, ['English']],
            ['Misery', ['Stephen King'],                             ['Horror', 'Mystery'], 1987, ['English']],
            ['The Stand', ['Stephen King'],                          ['Horror', 'Fiction'], 1978, ['English']],
            ['Dune', ['Frank Herbert'],                              ['Science', 'Fantasy'], 1965, ['English']],
            ['Foundation', ['Isaac Asimov'],                         ['Science', 'Fiction'], 1951, ['English']],
            ['Fahrenheit 451', ['Ray Bradbury'],                     ['Science', 'Fiction'], 1953, ['English']],
            ['The Martian', ['Andy Weir'],                           ['Science', 'Fiction'], 2011, ['English']],
            ['The Name of the Wind', ['Patrick Rothfuss'],           ['Fantasy', 'Adventure'], 2007, ['English']],
            ['A Game of Thrones', ['George R.R. Martin'],            ['Fantasy', 'Adventure'], 1996, ['English']],
            ['A Clash of Kings', ['George R.R. Martin'],             ['Fantasy', 'Adventure'], 1998, ['English']],
            ['A Storm of Swords', ['George R.R. Martin'],            ['Fantasy', 'Adventure'], 2000, ['English']],
            ['The Color Purple', ['Alice Walker'],                   ['Fiction'], 1982, ['English']],
            ['Beloved', ['Toni Morrison'],                           ['Fiction', 'History'], 1987, ['English']],
            ['The Bell Jar', ['Sylvia Plath'],                       ['Fiction'], 1963, ['English']],
            ['The Godfather', ['Mario Puzo'],                        ['Fiction', 'Mystery'], 1969, ['English']],
            ['The Old Man and the Sea', ['Ernest Hemingway'],        ['Fiction', 'Adventure'], 1952, ['English']],
            ['For Whom the Bell Tolls', ['Ernest Hemingway'],        ['Fiction', 'History'], 1940, ['English']],
            ['The Sun Also Rises', ['Ernest Hemingway'],             ['Fiction'], 1926, ['English']],
            ['One Hundred Years of Solitude', ['Gabriel García Márquez'], ['Fiction'], 1967, ['English']],
            ['Love in the Time of Cholera', ['Gabriel García Márquez'],   ['Fiction', 'Romance'], 1985, ['English']],
            ['The Metamorphosis', ['Franz Kafka'],                   ['Fiction', 'Horror'], 1915, ['English']],
            ['The Stranger', ['Albert Camus'],                       ['Fiction'], 1942, ['English']],
            ['The Trial', ['Franz Kafka'],                           ['Fiction', 'Mystery'], 1925, ['English']],
            ['The Brothers Karamazov', ['Fyodor Dostoevsky'],        ['Fiction'], 1880, ['English']],
            ['Anna Karenina', ['Leo Tolstoy'],                       ['Fiction', 'Romance'], 1877, ['English']],
            ['Madame Bovary', ['Gustave Flaubert'],                  ['Fiction'], 1856, ['English']],
            ['Les Misérables', ['Victor Hugo'],                      ['Fiction', 'History'], 1862, ['English']],
            ['The Hunchback of Notre-Dame', ['Victor Hugo'],         ['Fiction', 'History'], 1831, ['English']],
            ['Don Quixote', ['Miguel de Cervantes'],                 ['Fiction', 'Adventure'], 1605, ['English']],
            ['The Count of Monte Cristo', ['Alexandre Dumas'],       ['Fiction', 'Adventure'], 1844, ['English']],
            ['The Three Musketeers', ['Alexandre Dumas'],            ['Fiction', 'Adventure'], 1844, ['English']],
            ['Dracula', ['Bram Stoker'],                             ['Horror', 'Mystery'], 1897, ['English']],
            ['Frankenstein', ['Mary Shelley'],                        ['Horror', 'Science'], 1818, ['English']],
            ['The Time Machine', ['H.G. Wells'],                     ['Science', 'Fiction'], 1895, ['English']],
            ['The War of the Worlds', ['H.G. Wells'],                ['Science', 'Fiction'], 1898, ['English']],
            ['The Call of the Wild', ['Jack London'],                ['Fiction', 'Adventure'], 1903, ['English']],
            ['White Fang', ['Jack London'],                          ['Fiction', 'Adventure'], 1906, ['English']],
            ['The Grapes of Wrath', ['John Steinbeck'],              ['Fiction', 'History'], 1939, ['English']],
            ['Of Mice and Men', ['John Steinbeck'],                  ['Fiction'], 1937, ['English']],
            ['East of Eden', ['John Steinbeck'],                     ['Fiction'], 1952, ['English']],
            ['The Outsiders', ['S.E. Hinton'],                       ['Fiction'], 1967, ['English']],
            ['Gone with the Wind', ['Margaret Mitchell'],            ['Fiction', 'History'], 1936, ['English']],
            ['The Secret Garden', ['Frances Hodgson Burnett'],       ['Fiction'], 1911, ['English']],
            ['Little Women', ['Louisa May Alcott'],                  ['Fiction'], 1868, ['English']],
            ['Anne of Green Gables', ['L.M. Montgomery'],            ['Fiction'], 1908, ['English']],
            ['The Wind-Up Bird Chronicle', ['Haruki Murakami'],      ['Fiction', 'Mystery'], 1994, ['English']],
            ['Norwegian Wood', ['Haruki Murakami'],                  ['Fiction', 'Romance'], 1987, ['English']],
            ['Kafka on the Shore', ['Haruki Murakami'],              ['Fiction', 'Fantasy'], 2002, ['English']],
            ['The Girl on the Train', ['Paula Hawkins'],             ['Mystery', 'Fiction'], 2015, ['English']],
            ['The Goldfinch', ['Donna Tartt'],                       ['Fiction', 'Mystery'], 2013, ['English']],
            ['The Secret History', ['Donna Tartt'],                  ['Fiction', 'Mystery'], 1992, ['English']],
            ['The Book Thief', ['Markus Zusak'],                     ['Fiction', 'History'], 2005, ['English']],
            ['Life of Pi', ['Yann Martel'],                          ['Fiction', 'Adventure'], 2001, ['English']],
            ['The Giver', ['Lois Lowry'],                            ['Fiction', 'Science'], 1993, ['English']],
            ['The Help', ['Kathryn Stockett'],                       ['Fiction', 'History'], 2009, ['English']],
            ['Sapiens', ['Yuval Noah Harari'],                       ['Non-Fiction', 'History'], 2011, ['English']],
            ['Educated', ['Tara Westover'],                          ['Biography', 'Non-Fiction'], 2018, ['English']],
            ['Becoming', ['Michelle Obama'],                         ['Biography', 'Non-Fiction'], 2018, ['English']],
            ['Steve Jobs', ['Walter Isaacson'],                      ['Biography', 'Non-Fiction'], 2011, ['English']],
            ['Elon Musk', ['Ashlee Vance'],                          ['Biography', 'Non-Fiction'], 2015, ['English']],
            ['The Diary of a Young Girl', ['Anne Frank'],            ['Biography', 'History'], 1947, ['English']],
            ['The Art of War', ['Sun Tzu'],                          ['History', 'Non-Fiction'], -500, ['English']],
            ['The Prince', ['Niccolò Machiavelli'],                  ['History', 'Non-Fiction'], 1532, ['English']],
            ['The 7 Habits of Highly Effective People', ['Stephen R. Covey'], ['Non-Fiction'], 1989, ['English']],
            ['Thinking, Fast and Slow', ['Daniel Kahneman'],         ['Non-Fiction', 'Science'], 2011, ['English']],
            ['Atomic Habits', ['James Clear'],                       ['Non-Fiction'], 2018, ['English']],
            ['Laskar Pelangi', ['Andrea Hirata'],                    ['Fiction'], 2005, ['Indonesian']],
            ['Bumi Manusia', ['Pramoedya Ananta Toer'],              ['Fiction', 'History'], 1980, ['Indonesian']],
            ['Ayat-Ayat Cinta', ['Habiburrahman El Shirazy'],        ['Fiction', 'Romance'], 2004, ['Indonesian']],
            ['Negeri 5 Menara', ['Ahmad Fuadi'],                     ['Fiction'], 2009, ['Indonesian']],
        ];

        $authorSet = [];
        foreach ($books as $b) {
            foreach ($b[1] as $a) $authorSet[$a] = true;
        }
        $authorNames = array_keys($authorSet);

        $authorMap = [];
        foreach ($authorNames as $name) {
            $author = Author::firstOrCreate(
                ['name' => $name],
                ['profile_photo' => 'https://i.pravatar.cc/300?u=' . Str::slug($name)]
            );
            $authorMap[$name] = $author->name; 
        }

        foreach ($books as $i => $row) {
            [$title, $authorArr, $genreArr, $year, $langs] = $row;

            $genresClean = array_values(array_intersect($genreArr, $genreNames));
            if (empty($genresClean)) $genresClean = ['Fiction'];

            $authorNamesForJson = array_map(fn($n) => $authorMap[$n], $authorArr);

            Book::updateOrCreate(
                ['slug' => Str::slug($title) . '-' . ($i + 1)],
                [
                    'title'        => $title,
                    'image'        => 'https://source.unsplash.com/seed/' . Str::slug($title) . '/400x600?book',
                    'short_desc'   => 'A renowned book titled "' . $title . '" by ' . implode(', ', $authorArr) . '.',
                    'synopsis'     => "<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><br><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><br><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>",
                    'published_at' => $this->yearToDate($year),
                    'languages'    => json_encode($langs),
                    'genres'       => json_encode($genresClean),
                    'authors'      => json_encode($authorNamesForJson),
                ]
            );
        }
    }

    private function yearToDate(int $year): string
    {
        // Untuk karya kuno (contoh Sun Tzu), fallback ke 1900-01-01
        if ($year <= 0) return '1900-01-01';
        return $year . '-01-01';
    }
}
