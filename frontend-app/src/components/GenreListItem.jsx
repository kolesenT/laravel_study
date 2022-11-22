const GenreListItem = ({ id, title }) => {
    return (
    <article className="mb-3">
        <h2 className="mb-1" hidden>{id}</h2>
        <h2 className="mb-1">#{title}</h2>
    </article>);
};

export default GenreListItem;