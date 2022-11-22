import { Link } from "react-router-dom";
//
const MovieListItem = ({ id, title, year, user, genres, actors }) => {
    return (<article className="mb-3">
        <h2 className="mb-1">{title}</h2>
        <h3 className="mb-1">Release date {year}</h3>
        <p className="mb-1 text-muted"> by {user}</p>
        <p className="mb-1">
            {genres.map(genre => <span key={genre.id}>#{genre.title}</span>)}
        </p>
        <p className="mb-1">
            {actors.map(actor => <span key={actor.id}><p>{actor.name}{actor.surname}</p></span>)}
        </p>

        <Link to={`/movies/${id}`}>Description</Link>
    </article>);
};

export default MovieListItem;