interface Role {
    id: number;
    name: string;
    created_at: string;
    updated_at: string;
    pivot: {
        user_id: number;
        role_id: number;
    };
}

export const ucFirst = (str: string): string => {
    return str.charAt(0).toUpperCase() + str.slice(1);
};

export const formatRoles = (roles: Role[], max?: number): string => {
    const formattedRoles = roles.map((role) => role.name.replace(/_/g, ' ')).map((role) => ucFirst(role));

    if (max && roles.length > max) {
        return formattedRoles.slice(0, max).join(', ') + ', ...';
    }

    return formattedRoles.join(', ');
};
