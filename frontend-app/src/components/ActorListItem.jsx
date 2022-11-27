const ActorListItem = ({ id, name, surname, date_of_birth, heigth }) => {
    return (
        <article className="mb-3">
            <h2 className="mb-1" hidden>{id}</h2>
            <h1 className="mb-1">{name}</h1>
            <h2 className="mb-1">{surname}</h2>
            <h3 className="mb-1">{date_of_birth}</h3>
            <h3 className="mb-1">{heigth}</h3>
        </article>
    );

};

export default ActorListItem;