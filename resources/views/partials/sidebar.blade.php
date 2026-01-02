<aside class="text-light p-4 rounded" style="height: 800px">
    <h5 class="mb-4 border-bottom pb-2 text-center">📚 Book Panel</h5>

    <ul class="list-unstyled">
        <li class="mb-3">
            <a href="{{ route('book.list') }}" class="text-light text-decoration-none d-block p-2 rounded hover-link">
                📖 View Books
            </a>
        </li>
        <li>
            <a href="{{ route('book.create') }}" class="text-light text-decoration-none d-block p-2 rounded hover-link">
                ➕ Create Book
            </a>
        </li>
    </ul>
</aside>
